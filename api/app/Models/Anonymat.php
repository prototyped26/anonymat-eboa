<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anonymat extends Model
{
    //
    // protected $timestamps = false;
    protected $table = 'anonymat';
    //
    protected $fillable = [
        'eleve_id', 'epreuve_id', 'numero'
    ];

    public function eleve() {
        return $this->belongsTo(Eleve::class);
    }

    public  function epreuve() {
        return $this->belongsTo(Epreuve::class);
    }
}
