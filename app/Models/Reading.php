<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $table = 'readings';  

    protected $fillable = ['student_id', 'batch_id', 'exam_name', 'custom_student_id', 'assignment_id', 'test_name', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

}
