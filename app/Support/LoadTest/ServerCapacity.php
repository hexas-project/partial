<?php

namespace App\Support\LoadTest;

use Illuminate\Support\Facades\DB;

/**
 * Server ek sathe koto ta request dhorte pare — sei limit gulo ek jaygay ane.
 *
 * Duita alada jinis ache, guliye fela sohoj:
 *
 *  1) PHP worker limit — ek sathe koto ta PHP process/thread request handle
 *     korte pare. Eta-i asol "koto jon k access dite parbo" er chhad.
 *  2) MySQL connection limit — protita PHP request DB te ekta connection ney.
 *     Worker limit boro hoye MySQL max_connections chhoto hole ekhane atkabe.
 *
 * Duitar moddhe je chhoto, seta-i asol limit.
 */
class ServerCapacity
{
    /**
     * @return array<string,mixed>
     */
    public static function snapshot(): array
    {
        return [
            'sapi'        => PHP_SAPI,
            'php_version' => PHP_VERSION,
            'os'          => PHP_OS_FAMILY,
            'workers'     => self::phpWorkers(),
            'database'    => self::database(),
            'drivers'     => [
                'session' => config('session.driver'),
                'cache'   => config('cache.default'),
                'queue'   => config('queue.default'),
            ],
            'app_debug'   => (bool) config('app.debug'),
            'opcache'     => self::opcache(),
            'sampled_at'  => now()->toDateTimeString(),
        ];
    }

    /**
     * PHP er dike ek sathe koto ta request cholte pare.
     *
     * @return array{limit:int|null,source:string,note:string|null,server:string}
     */
    private static function phpWorkers(): array
    {
        // ---- php artisan serve / php -S (built-in server) ----
        if (PHP_SAPI === 'cli-server') {
            // Built-in server er multi-worker ta fork() diye hoy — seta shudhu
            // POSIX e. Windows e PHP_CLI_SERVER_WORKERS puro upekkha hoy, ek
            // somoye ekta request-i cholte pare.
            if (PHP_OS_FAMILY === 'Windows') {
                return [
                    'limit'  => 1,
                    'source' => 'PHP built-in server (Windows)',
                    'server' => 'php artisan serve',
                    'note'   => 'Windows e built-in server single-process. PHP_CLI_SERVER_WORKERS kaj kore na, ek somoye 1 ta request. Asol limit janar jonno Linux + PHP-FPM/Nginx e test korun.',
                ];
            }

            $workers = (int) (getenv('PHP_CLI_SERVER_WORKERS') ?: 1);

            return [
                'limit'  => max(1, $workers),
                'source' => 'PHP_CLI_SERVER_WORKERS',
                'server' => 'php artisan serve',
                'note'   => 'Built-in server shudhu development er jonno. Production er number ei test theke bojha jabe na.',
            ];
        }

        // ---- PHP-FPM ----
        if (PHP_SAPI === 'fpm-fcgi') {
            // fpm_get_status() FPM 7.3+ e pool er live obostha dey.
            if (function_exists('fpm_get_status')) {
                $status = @fpm_get_status();

                if (is_array($status)) {
                    return [
                        'limit'  => isset($status['total-processes']) ? (int) $status['total-processes'] : null,
                        'source' => 'fpm_get_status()',
                        'server' => 'PHP-FPM (pool: ' . ($status['pool'] ?? '?') . ')',
                        'note'   => 'Pool e ekhon ' . ($status['active-processes'] ?? '?') . ' ta active, '
                            . ($status['total-processes'] ?? '?') . ' ta total process. Hard chhad pm.max_children — seta pool config file e.',
                    ];
                }
            }

            return [
                'limit'  => null,
                'source' => 'unknown',
                'server' => 'PHP-FPM',
                'note'   => 'pm.max_children PHP theke pora jay na. Server e dekhun: /etc/php/*/fpm/pool.d/www.conf',
            ];
        }

        // ---- Apache mod_php ----
        if (PHP_SAPI === 'apache2handler') {
            return [
                'limit'  => null,
                'source' => 'unknown',
                'server' => 'Apache (mod_php)',
                'note'   => 'Apache MPM setting (MaxRequestWorkers) PHP theke pora jay na. httpd.conf e dekhun.',
            ];
        }

        return [
            'limit'  => null,
            'source' => 'unknown',
            'server' => PHP_SAPI,
            'note'   => 'Ei SAPI er worker limit auto detect kora jay ni.',
        ];
    }

    /**
     * MySQL er connection limit + ekhon koto ta connection/query cholche.
     *
     * @return array<string,mixed>
     */
    public static function database(): array
    {
        return [
            'driver'               => config('database.default'),
            'max_connections'      => self::intStatus('VARIABLES', 'max_connections'),
            'threads_connected'    => self::threadsConnected(),
            'threads_running'      => self::threadsRunning(),
            'max_used_connections' => self::intStatus('STATUS', 'Max_used_connections'),
        ];
    }

    /** Ekhon koto ta connection DB te khola — proti web request e ekta kore lage. */
    public static function threadsConnected(): ?int
    {
        return self::intStatus('STATUS', 'Threads_connected');
    }

    /** Ekhon koto ta query ek-i somoye execute hocche. */
    public static function threadsRunning(): ?int
    {
        return self::intStatus('STATUS', 'Threads_running');
    }

    /**
     * `SHOW STATUS LIKE ?` MySQL/MariaDB prepare korte pare na (syntax error), tai
     * nam ta query te bosate hoy. Injection er jayga na rakhte nam ta age
     * whitelist regex diye jachai kora hoy — bahir theke kono value ekhane ashe na.
     */
    private static function intStatus(string $kind, string $name): ?int
    {
        if (!preg_match('/^[A-Za-z_]+$/', $name)) {
            return null;
        }

        try {
            $rows = DB::select("SHOW {$kind} LIKE '{$name}'");
        } catch (\Throwable $e) {
            return null;
        }

        if (empty($rows)) {
            return null;
        }

        $row = (array) $rows[0];

        return isset($row['Value']) ? (int) $row['Value'] : null;
    }

    /**
     * OPcache bondho thakle protita request e PHP file abar compile hoy —
     * sei obosthay concurrency number onek kome jay, tai eta dekhano dorkar.
     *
     * @return array<string,mixed>
     */
    private static function opcache(): array
    {
        if (!function_exists('opcache_get_status')) {
            return ['enabled' => false, 'note' => 'opcache extension nei'];
        }

        $status = @opcache_get_status(false);

        return [
            'enabled' => is_array($status) && ($status['opcache_enabled'] ?? false),
            'note'    => null,
        ];
    }
}
