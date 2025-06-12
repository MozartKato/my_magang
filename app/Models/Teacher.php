<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'user_id',
        'nip',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
