<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAssignment extends Model
{
    protected $fillable = [
        'batch_id',
        'test_id',
        'test_name',
        'test_category',
        'start_date',
        'closing_date',
        'exam_name',
        'username',
        'password',
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'closing_date' => 'datetime',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
