<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable=[
        'user_id',
        'nis',
        'address',
        'phone',
        'class',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
