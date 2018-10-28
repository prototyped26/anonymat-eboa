<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    // protected $timestamps = false;
    protected $table = 'filiere';
    //
    protected $fillable = [
        'label', 'desc', 'cycle_id'
    ];

    public function cycle() {
        return $this->belongsTo(Cycle::class, 'cycle_id', 'id');
    }

    public function options() {
        return $this->hasMany(Option::class);
    }
}
