<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseToggle extends Model
{
     protected $fillable = ['teacher_id', 'batch', 'course', 'enabled'];

    // Global ON for a batch if ANY teacher enabled it
    public static function isEnabledForBatch(string $batch, string $course): bool
    {
        return static::where('batch', $batch)
            ->where('course', $course)
            ->where('enabled', true)
            ->exists();
    }
}
