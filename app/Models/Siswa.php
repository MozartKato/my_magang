<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable=[
        'user_is',
        'nis',
        'address',
        'phone',
        'class',
        'major_id',
    ];
}
