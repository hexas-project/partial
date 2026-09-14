<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading_result_admin extends Model
{
   protected $table = 'reading_result_admins'; 

    protected $fillable = [
        'test_name',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
