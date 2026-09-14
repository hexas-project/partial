<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('listining_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('batch_id')->nullable()->after('student_id');
            $table->string('exam_name')->nullable()->after('batch_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listining_answers', function (Blueprint $table) {
            $table->dropColumn(['batch_id', 'exam_name']);
        });
    }
};
