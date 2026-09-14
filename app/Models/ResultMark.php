<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultMark extends Model
{
   protected $fillable = ['student_id','test_name','marks'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
