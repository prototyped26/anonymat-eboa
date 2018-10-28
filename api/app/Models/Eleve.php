<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    // protected $timestamps = false;
    protected $table = 'eleve';
    //
    protected $fillable = [
        'nom', 'prenom','date_naiss','lieu_naiss', 'num_enregistrement', 'option_id',
    ];

    public function option() {
        return $this->belongsTo(Option::class);
    }
}
