<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listening_answer extends Model
{
     protected $table = 'listening_answer_admin';

    protected $fillable = [
        'test_name',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array', 
    ];
}
