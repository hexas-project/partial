<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestProgress extends Model
{
    protected $table = 'test_progress';

    protected $fillable = [
        'student_id',
        'path',
        'assignment_id',
        'exam_student_id',   // start modal এ টাইপ করা Student ID — এক PC/এক batch এ কার state তা আলাদা করে
        'remaining_ms',
        'audio_time',
    ];
}
