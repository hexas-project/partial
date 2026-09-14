<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherBatch extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'batch'];

    // Define the relationship with the User model (teachers)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

