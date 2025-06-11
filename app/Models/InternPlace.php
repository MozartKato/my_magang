<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternPlace extends Model
{
    protected $fillable = [
        'name',
        'major_id',
        'address'
    ];
}
