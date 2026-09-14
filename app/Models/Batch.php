<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'exam_name',
        'batch_name',
        'type',
        'mobile',
        'email',
        'username',
        'password',
        'active_session_token'
    ];
}
