<?php

namespace App\Console\Commands;

use App\Support\LoadTest\LoadTestRunner;
use App\Support\LoadTest\LoadTestState;
use Illuminate\Console\Command;

/**
 * Load test ta ei CLI process e chole, web request er bhitore noy.
 *
 * Keno eta joruri: web request er bhitore chalale sei request nijei ekta worker
 * dokhol kore rakhto. Server e jodi 4 ta worker thake, tahole mapa jeto matro
 * 3 ta — number-i vul hoye jeto. Alada process e chalale server er puro
 * capacity ta test er jonno khali thake.
 *
 * Page theke button e click korle LoadTestController ei command take background
 * e chalu kore dey; command progress JSON file e likhe, page seta poll kore.
 *
 * Hate chalate:
 *   php artisan hexas:load-test --users=50 --target=/listening/fourone
 */
class RunLoadTest extends Command
{
    protected $signature = 'hexas:load-test
                            {--users=25 : Koto jon virtual user ek sathe hit korbe}
                            {--target=/exam/dashboard : Kon page e hit hobe}
                            {--label= : Table e dekhanor jonno page er nam}
                            {--base-url= : Site er address (default APP_URL)}
                            {--mode=simulated : simulated = temporary account, real = asol batch}
                            {--timeout=60 : Ekta request er sorbochho somoy (second)}
                            {--run-id= : Progress file er id (page nijei dey)}
                            {--purge : Age crash kora run er temporary batch muche dey}';

    protected $description = 'Sob user ek sathe test page e hit korle server koto jon k service dite pare — seta mape';

    public function handle(): int
    {
        if ($this->option('purge')) {
            $n = LoadTestRunner::purgeStaleSimulatedBatches();
            $this->info("{$n} ta purono LOADTEST batch muche dewa holo.");

            return self::SUCCESS;
        }

        $users = max(1, (int) $this->option('users'));
        $mode  = $this->option('mode') === 'real' ? 'real' : 'simulated';

        $target = '/' . ltrim((string) $this->option('target'), '/');
        $label  = (string) ($this->option('label') ?: $target);

        $baseUrl = (string) ($this->option('base-url') ?: config('app.url'));
        $runId   = (string) ($this->option('run-id') ?: date('Ymd_His'));

        LoadTestState::pruneOlderThan(24);

        $this->info("Load test suru — {$users} jon user, target {$target}");
        $this->line("Base URL : {$baseUrl}");
        $this->line("Mode     : {$mode}");
        $this->line("Run ID   : {$runId}");
        $this->newLine();

        $runner = new LoadTestRunner(
            runId: $runId,
            baseUrl: $baseUrl,
            targetPath: $target,
            targetLabel: $label,
            userCount: $users,
            mode: $mode,
            timeout: max(5, (int) $this->option('timeout')),
        );

        $result = $runner->run();

        if (($result['status'] ?? '') === 'failed') {
            $this->error('Failed: ' . ($result['error'] ?? 'unknown'));

            return self::FAILURE;
        }

        $m = $result['metrics'] ?? [];

        $this->newLine();
        $this->info('--- Result ---');
        $this->table(['Ki', 'Man'], [
            ['Sofol (200 OK)',            ($m['ok'] ?? 0) . ' / ' . $users],
            ['Byartho',                   $m['failed'] ?? 0],
            ['Mot somoy',                 round(($m['wall_ms'] ?? 0) / 1000, 2) . ' s'],
            ['Baseline (ek jon ekla)',    ($m['baseline_ms'] ?? '?') . ' ms'],
            ['Druto tomo',                ($m['min_ms'] ?? '?') . ' ms'],
            ['Gor',                       ($m['avg_ms'] ?? '?') . ' ms'],
            ['p95',                       ($m['p95_ms'] ?? '?') . ' ms'],
            ['Sobcheye deri',             ($m['max_ms'] ?? '?') . ' ms'],
            ['Throughput',                ($m['rps'] ?? '?') . ' req/sec'],
            ['>> EK SATHE SERVICE PACCHE', ($m['served_concurrency'] ?? '?') . ' jon'],
            ['DB peak connection',        $m['db_peak_connected'] ?? '?'],
        ]);

        $this->newLine();
        $this->line('Progress file: ' . (new LoadTestState($runId))->path());

        return self::SUCCESS;
    }
}
