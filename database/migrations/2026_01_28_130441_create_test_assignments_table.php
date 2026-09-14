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
        Schema::create('test_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->string('test_id');
            $table->string('test_name');
            $table->string('test_category');
            $table->dateTime('start_date');
            $table->dateTime('closing_date');
            $table->string('exam_name');
            $table->string('username');
            $table->string('password');
            $table->enum('status', ['pending', 'active', 'expired'])->default('pending');
            $table->timestamps();
            
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_assignments');
    }
};
