<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    protected $table = 'epreuve';
    //
    protected $fillable = [
        'label', 'desc',
    ];
}
