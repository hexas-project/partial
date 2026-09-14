<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Test er answer table gulo te suru theke shudhu primary key `id` chilo.
 * Tai autosave / page-load er protita lookup
 *   (student_id + test_name + assignment_id)
 * full table scan korto. `lockForUpdate()` er sathe seta scan kora protita row
 * lock kore felto — mane ek student er autosave cholakalin baki sobar autosave
 * block hoye thakto. Row kom thakte eta invisible chilo, row barar sathe sathe
 * PHP worker gula MySQL lock er opekkhay atke jete suru kore ("children busy").
 *
 * test_name VARCHAR(255) utf8mb4 = 1020 byte. Purono MySQL (COMPACT row format)
 * e ek column er index limit 767 byte, tai prefix (100) use kora holo — test name
 * gulo 20 character er kom, prefix e selectivity purota-i thake.
 */
return new class extends Migration
{
    /** table => [index name => raw column list] */
    private array $indexes = [
        'listining_answers' => [
            'lia_student_test_assignment_idx' => '`student_id`, `test_name`(100), `assignment_id`',
            'lia_created_at_idx'              => '`created_at`',
        ],
        'readings' => [
            'rdg_student_test_assignment_idx' => '`student_id`, `test_name`(100), `assignment_id`',
            'rdg_created_at_idx'              => '`created_at`',
        ],
        'writings' => [
            'wrt_student_test_assignment_idx' => '`student_id`, `test_name`(100), `assignment_id`',
            'wrt_created_at_idx'              => '`created_at`',
        ],
        // NOTE: listening_answer_admin ar reading_result_admins e test_name er
        // upor age thekei UNIQUE index ache — tai oikhane notun index lagbe na.
        // Redundant index shudhu jayga nito ar protita write slow korto.

        // Cleanup command purono row khuje ber korar jonno created_at use kore.
        'test_progress' => [
            'tp_created_at_idx' => '`created_at`',
        ],
    ];

    public function up(): void
    {
        // Prefix index (`col`(100)) ar information_schema — duitai MySQL/MariaDB
        // er nijossho. Test suite sqlite :memory: te chole, tai oikhane skip.
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        foreach ($this->indexes as $table => $definitions) {
            if (!Schema::hasTable($table)) {
                continue;
            }

            foreach ($definitions as $name => $columns) {
                if ($this->indexExists($table, $name)) {
                    continue;
                }

                // Column ta sotti ache kina — purono install e column missing hote pare.
                if (!$this->columnsExist($table, $columns)) {
                    continue;
                }

                DB::statement("CREATE INDEX `{$name}` ON `{$table}` ({$columns})");
            }
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        foreach ($this->indexes as $table => $definitions) {
            if (!Schema::hasTable($table)) {
                continue;
            }

            foreach (array_keys($definitions) as $name) {
                if ($this->indexExists($table, $name)) {
                    DB::statement("DROP INDEX `{$name}` ON `{$table}`");
                }
            }
        }
    }

    private function indexExists(string $table, string $index): bool
    {
        return count(DB::select(
            'SELECT 1 FROM information_schema.statistics
             WHERE table_schema = DATABASE() AND table_name = ? AND index_name = ? LIMIT 1',
            [$table, $index]
        )) > 0;
    }

    /** "`a`, `b`(100), `c`" theke column naam ber kore protita ache kina dekhe */
    private function columnsExist(string $table, string $columns): bool
    {
        preg_match_all('/`([^`]+)`/', $columns, $matches);

        foreach ($matches[1] as $column) {
            if (!Schema::hasColumn($table, $column)) {
                return false;
            }
        }

        return true;
    }
};
