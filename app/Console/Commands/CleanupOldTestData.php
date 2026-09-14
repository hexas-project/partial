<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/**
 * Purono test data muche table chhoto rakhe.
 *
 * Keno daily chole, "2 month por por" na:
 * ek sathe koyek mash er lakh khanek row delete korle MySQL onek khon table
 * lock kore rakhe — sei somoy site puro atke jabe. Prottidin choto kore
 * (2 month er cheye purono ja ache) muchle window ta ekii thake, kintu kono
 * din boro lock hoy na. Fole exam cholakalin-o kono jhuki nei.
 *
 * Safety:
 *  - created_at AAR updated_at duitai cutoff er purono hote hobe. Purono
 *    row jodi ekhono kew edit korche (resume kore fire eshe likhche), seta
 *    bache jabe.
 *  - NULL timestamp wala row kokhono delete hobe na (`<` comparison false).
 *  - chunk kore delete, protita chunk er por choto biroti.
 */
class CleanupOldTestData extends Command
{
    protected $signature = 'hexas:cleanup-old-test-data
                            {--months= : Koto month er data rakha hobe (default config/hexas.php)}
                            {--chunk=500 : Ek bar e koto row delete hobe}
                            {--dry-run : Kichu delete korbe na, shudhu koto row jeto dekhabe}';

    protected $description = 'Retention window er cheye purono listening/reading/writing attempt ar test progress delete kore';

    /** Table => timestamp column jeta dhore purono kina bicar hobe */
    private const TABLES = [
        'listining_answers' => 'Listening attempts',
        'readings'          => 'Reading attempts',
        'writings'          => 'Writing attempts',
        'test_progress'     => 'Test progress (timer/audio resume)',
    ];

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        if (!$dryRun && !config('hexas.cleanup_enabled')) {
            $this->warn('TEST_DATA_CLEANUP_ENABLED=false — kichu delete kora holo na.');
            return self::SUCCESS;
        }

        $months = (int) ($this->option('months') ?: config('hexas.test_data_retention_months', 2));

        if ($months < 1) {
            $this->error('months অন্তত 1 hote hobe. Bondho korte chaile TEST_DATA_CLEANUP_ENABLED=false korun.');
            return self::FAILURE;
        }

        $chunk  = max(50, (int) $this->option('chunk'));
        $cutoff = Carbon::now('Asia/Dhaka')->subMonths($months)->startOfDay();

        $this->info(($dryRun ? '[DRY RUN] ' : '') . "Cutoff: {$cutoff->toDateTimeString()} (last {$months} month er data rakha hobe)");
        $this->newLine();

        $summary = [];

        foreach (self::TABLES as $table => $label) {
            if (!Schema::hasTable($table)) {
                $this->line("  - {$label}: table nei, skip");
                continue;
            }

            if (!Schema::hasColumn($table, 'created_at') || !Schema::hasColumn($table, 'updated_at')) {
                $this->line("  - {$label}: timestamp column nei, skip");
                continue;
            }

            $deleted = $dryRun
                ? $this->countOld($table, $cutoff)
                : $this->deleteOld($table, $cutoff, $chunk);

            $summary[$label] = $deleted;
            $this->line(sprintf('  - %-40s %s row', $label, number_format($deleted)));
        }

        // Meyad-uttirno session row — eta na muchle sessions table bere jay, ar
        // oi table ta protita request e middleware theke query hoy.
        if (!$dryRun && Schema::hasTable('sessions')) {
            $sessionCutoff = time() - (((int) config('session.lifetime', 120)) * 60);
            $sessions = DB::table('sessions')->where('last_activity', '<', $sessionCutoff)->delete();
            $summary['Expired sessions'] = $sessions;
            $this->line(sprintf('  - %-40s %s row', 'Expired sessions', number_format($sessions)));
        }

        $this->newLine();
        $this->info($dryRun ? 'Dry run sesh — kichu delete hoyni.' : 'Cleanup sesh.');

        if (!$dryRun && array_sum($summary) > 0) {
            Log::info('hexas:cleanup-old-test-data', ['cutoff' => $cutoff->toDateTimeString()] + $summary);
        }

        return self::SUCCESS;
    }

    private function countOld(string $table, Carbon $cutoff): int
    {
        return (int) $this->oldRows($table, $cutoff)->count();
    }

    private function deleteOld(string $table, Carbon $cutoff, int $chunk): int
    {
        $total = 0;

        do {
            $deleted = $this->oldRows($table, $cutoff)->limit($chunk)->delete();
            $total += $deleted;

            if ($deleted > 0) {
                usleep(150000); // MySQL ke dom nite dey, replication lag-o kome
            }
        } while ($deleted > 0);

        return $total;
    }

    private function oldRows(string $table, Carbon $cutoff)
    {
        return DB::table($table)
            ->where('created_at', '<', $cutoff)
            ->where('updated_at', '<', $cutoff);
    }
}
