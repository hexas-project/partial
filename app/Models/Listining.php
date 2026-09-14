<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listining extends Model
{
    protected $table = 'listining_answers';
   protected $fillable = ['student_id', 'batch_id', 'exam_name', 'assignment_id', 'custom_student_id', 'test_name', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

}
