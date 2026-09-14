<?php

namespace App\Support\LoadTest;

/**
 * Ekta load test run er obostha ekta JSON file e rakhe.
 *
 * Keno cache/DB na, file:
 * Load test cholakalin DB ar cache tabile-i to chap porche — progress o oikhane
 * likhle amra nijerai test ta noshto kore feltam (measurement nijei load toiri
 * kore). Tai progress alada file e jay, storage/app/load-tests/ e.
 *
 * Likha atomic: age .tmp file e likhe tarpor rename. Fole browser jokhon
 * porche, tokhon kokhono adha-lekha JSON pabe na.
 */
class LoadTestState
{
    public function __construct(private string $runId)
    {
    }

    public static function dir(): string
    {
        $dir = storage_path('app/load-tests');

        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        return $dir;
    }

    public function path(): string
    {
        return self::dir() . DIRECTORY_SEPARATOR . $this->runId . '.json';
    }

    /** Cancel signal — runner protita loop e ei file ta ache kina dekhe. */
    public function stopPath(): string
    {
        return self::dir() . DIRECTORY_SEPARATOR . $this->runId . '.stop';
    }

    public function exists(): bool
    {
        return is_file($this->path());
    }

    /** @param array<string,mixed> $data */
    public function write(array $data): void
    {
        $data['updated_at'] = microtime(true);

        $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

        if ($json === false) {
            return;
        }

        $tmp = $this->path() . '.tmp';

        if (@file_put_contents($tmp, $json) === false) {
            return;
        }

        // rename() Windows ar Linux duitatei existing file overwrite kore,
        // ar eta atomic — tai reader adha file pay na.
        @rename($tmp, $this->path());
    }

    /** @return array<string,mixed>|null */
    public function read(): ?array
    {
        $path = $this->path();

        if (!is_file($path)) {
            return null;
        }

        // Rename atomic holeo file system er timing e mile jete pare — ekbar
        // retry korle hoye jay.
        for ($i = 0; $i < 3; $i++) {
            $raw = @file_get_contents($path);

            if ($raw !== false && $raw !== '') {
                $data = json_decode($raw, true);

                if (is_array($data)) {
                    return $data;
                }
            }

            usleep(20000);
        }

        return null;
    }

    public function requestStop(): void
    {
        @file_put_contents($this->stopPath(), (string) time());
    }

    public function stopRequested(): bool
    {
        return is_file($this->stopPath());
    }

    public function clearStop(): void
    {
        @unlink($this->stopPath());
    }

    /** Purono run er file gulo joma hote dey na. */
    public static function pruneOlderThan(int $hours = 24): void
    {
        $cutoff = time() - ($hours * 3600);

        foreach (glob(self::dir() . DIRECTORY_SEPARATOR . '*') ?: [] as $file) {
            if (is_file($file) && @filemtime($file) < $cutoff) {
                @unlink($file);
            }
        }
    }

    /** Sob theke notun run er id — page reload korle abar oi run e fire asha jay. */
    public static function latestRunId(): ?string
    {
        $files = glob(self::dir() . DIRECTORY_SEPARATOR . '*.json') ?: [];

        if (empty($files)) {
            return null;
        }

        usort($files, fn ($a, $b) => filemtime($b) <=> filemtime($a));

        return basename($files[0], '.json');
    }
}
