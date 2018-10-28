<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    // protected $timestamps = false;
    protected $table = 'cycle';
    //
    protected $fillable = [
        'label', 'desc'
    ];
}
