<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Resume এর semantics বদলাচ্ছে: deadline → paused clock।
     *
     * আগে end_timestamp (কখন শেষ হবে) রাখা হতো, তাই test থেকে বেরিয়ে গেলেও ঘড়ি চলত —
     * ৩ মিনিট বাইরে থাকলে ৩ মিনিট কেটে যেত, অথচ audio ওখানেই দাঁড়িয়ে থাকত (mismatch)।
     * এখন remaining_ms (কত সময় বাকি) রাখা হয়, তাই timer আর audio দুটোই একই জায়গা থেকে
     * শুরু হয়। বাইরে থাকার সময়টুকু আর কাটে না — শুধু assignment এর closing date এখনো
     * শেষ সীমা হিসেবে কাজ করে (getTestProgress এ check হয়)।
     */
    public function up(): void
    {
        Schema::table('test_progress', function (Blueprint $table) {
            if (!Schema::hasColumn('test_progress', 'remaining_ms')) {
                $table->unsignedBigInteger('remaining_ms')->nullable()->after('assignment_id');
            }
        });

        // চলমান row গুলো এক করে নেওয়া: বাকি সময় = deadline − এখন (পেরিয়ে গেলে 0)
        if (Schema::hasColumn('test_progress', 'end_timestamp')) {
            $now = (int) round(microtime(true) * 1000);

            // GREATEST()/CAST(... AS SIGNED) MySQL er nijossho — test suite sqlite e
            // chole, oikhane ei function nei. Duitar jonno alada expression.
            $expression = \DB::getDriverName() === 'sqlite'
                ? "MAX(end_timestamp - {$now}, 0)"
                : "GREATEST(CAST(end_timestamp AS SIGNED) - {$now}, 0)";

            \DB::table('test_progress')
                ->whereNotNull('end_timestamp')
                ->update(['remaining_ms' => \DB::raw($expression)]);

            Schema::table('test_progress', function (Blueprint $table) {
                $table->dropColumn('end_timestamp');
            });
        }
    }

    public function down(): void
    {
        Schema::table('test_progress', function (Blueprint $table) {
            if (!Schema::hasColumn('test_progress', 'end_timestamp')) {
                $table->unsignedBigInteger('end_timestamp')->nullable()->after('assignment_id');
            }
        });

        if (Schema::hasColumn('test_progress', 'remaining_ms')) {
            $now = (int) round(microtime(true) * 1000);
            \DB::table('test_progress')
                ->whereNotNull('remaining_ms')
                ->update(['end_timestamp' => \DB::raw("remaining_ms + {$now}")]);

            Schema::table('test_progress', function (Blueprint $table) {
                $table->dropColumn('remaining_ms');
            });
        }
    }
};
