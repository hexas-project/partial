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
        Schema::create('course_toggles', function (Blueprint $table) {
             $table->id();
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->string('batch'); // same string used in users.batch
            $table->enum('course', ['listening', 'reading', 'writing']);
            $table->boolean('enabled')->default(false);
            $table->timestamps();

            $table->unique(['teacher_id','batch','course']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_toggles');
    }
};
