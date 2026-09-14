<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Server-side resume state (timer deadline + audio position) so a test can be
     * resumed from any device / after power loss — not just from the same browser's
     * localStorage. Keyed by student + page path + assignment.
     *
     * end_timestamp = deadline in epoch milliseconds (same value the browser keeps
     * in localStorage), so the existing deadline-style timer logic stays unchanged.
     */
    public function up(): void
    {
        Schema::create('test_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('path');                       // window.location.pathname of the test page
            $table->unsignedBigInteger('assignment_id')->nullable();
            $table->unsignedBigInteger('end_timestamp')->nullable();
            $table->float('audio_time')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'path', 'assignment_id'], 'test_progress_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_progress');
    }
};
