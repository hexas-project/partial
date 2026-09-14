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
        // Add custom_student_id to listining_answers table
        Schema::table('listining_answers', function (Blueprint $table) {
            $table->string('custom_student_id')->nullable()->after('exam_name');
        });
        
        // Add custom_student_id to readings table
        Schema::table('readings', function (Blueprint $table) {
            $table->string('custom_student_id')->nullable()->after('exam_name');
        });
        
        // Add custom_student_id to writings table
        Schema::table('writings', function (Blueprint $table) {
            $table->string('custom_student_id')->nullable()->after('exam_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listining_answers', function (Blueprint $table) {
            $table->dropColumn('custom_student_id');
        });
        
        Schema::table('readings', function (Blueprint $table) {
            $table->dropColumn('custom_student_id');
        });
        
        Schema::table('writings', function (Blueprint $table) {
            $table->dropColumn('custom_student_id');
        });
    }
};
