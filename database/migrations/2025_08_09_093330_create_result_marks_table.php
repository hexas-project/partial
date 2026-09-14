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
        Schema::create('result_marks', function (Blueprint $table) {
              $table->id();
                $table->unsignedBigInteger('student_id');
                $table->string('test_name');
                $table->unsignedInteger('marks')->nullable();
                $table->timestamps();

                $table->unique(['student_id', 'test_name']);
                $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_marks');
    }
};
