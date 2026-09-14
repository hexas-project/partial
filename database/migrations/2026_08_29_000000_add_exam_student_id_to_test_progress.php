<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Resume state কার — সেটা আলাদা করার জন্য exam_student_id।
     *
     * এতদিন row টা ছিল student_id + path + assignment_id দিয়ে। কিন্তু student_id আসলে
     * batch id (batch এর username/password দিয়ে login হয়) এবং assignment_id-ও batch
     * অনুযায়ী — অর্থাৎ এক batch এর সব student এর জন্য একটাই row। ফলে একজন সময় বাকি
     * রেখে বেরিয়ে গেলে ওই batch এর পরের student (যেকোনো PC তে, পরদিনও) ওর বাকি সময়টাই
     * পেয়ে যেত।
     *
     * start modal এ টাইপ করা Student ID-ই একমাত্র per-student পরিচয়, তাই সেটা row এর
     * অংশ করা হলো। যে page গুলোতে start modal নেই (speaking, কিছু GT reading/writing)
     * সেখানে '' থাকবে — ওই page গুলোর আচরণ আগের মতোই।
     *
     * NULL নয়, '' রাখা হয়েছে ইচ্ছে করে: MySQL এর unique index এ একাধিক NULL অনুমোদিত,
     * ফলে NULL হলে ID-হীন page গুলোর জন্য duplicate row তৈরি হতে পারত।
     */
    public function up(): void
    {
        if (!Schema::hasColumn('test_progress', 'exam_student_id')) {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->string('exam_student_id', 64)->default('')->after('assignment_id');
            });
        }

        // unique index টা নতুন column সহ বানানো হয় — নইলে updateOrCreate এক student এর
        // row অন্য student এর টা দিয়ে চাপা দিয়ে দিত।
        try {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->dropUnique('test_progress_unique');
            });
        } catch (\Throwable $e) {
            // index আগেই নেই — কিছু করার নেই
        }

        try {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->unique(
                    ['student_id', 'path', 'assignment_id', 'exam_student_id'],
                    'test_progress_unique'
                );
            });
        } catch (\Throwable $e) {
            // index আগেই আছে — কিছু করার নেই
        }

        // এই fix এর আগের row গুলোতে কোন student তা লেখা নেই, তাই ওগুলো দিয়ে resume করালে
        // আবারও ভুল student এর সময় চলে যেতে পারে। পুরোনো row মানে ওই test এমনিতেই শেষ —
        // তাই একবার মুছে ফেলাই নিরাপদ। (row মুছলে test শুধু পুরো সময় নিয়ে শুরু হবে।)
        try {
            \DB::table('test_progress')->where('exam_student_id', '')->delete();
        } catch (\Throwable $e) {
        }
    }

    public function down(): void
    {
        try {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->dropUnique('test_progress_unique');
            });
        } catch (\Throwable $e) {
        }

        if (Schema::hasColumn('test_progress', 'exam_student_id')) {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->dropColumn('exam_student_id');
            });
        }

        try {
            Schema::table('test_progress', function (Blueprint $table) {
                $table->unique(['student_id', 'path', 'assignment_id'], 'test_progress_unique');
            });
        } catch (\Throwable $e) {
        }
    }
};
