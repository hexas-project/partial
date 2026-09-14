<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $fillable = ['student_id', 'batch_id', 'exam_name', 'custom_student_id', 'assignment_id', 'test_name', 'task'];

    protected $casts = [
        'task' => 'array', // JSON <-> array
    ];
    
    public function student()
        {
            return $this->belongsTo(\App\Models\User::class, 'student_id');
        }
}
