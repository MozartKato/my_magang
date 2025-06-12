<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternApply extends Model
{
    protected $fillable = [
        'student_id',
        'intern_place_id',
        'group_code',
        'status',
        'is_leader',
        'rejection_reason'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function internPlace()
    {
        return $this->belongsTo(InternPlace::class);
    }
}
