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
        Schema::create('teacher_batches', function (Blueprint $table) {
           $table->id();
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // Assuming the teachers are stored in the users table
            $table->string('batch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_batches');
    }
};
