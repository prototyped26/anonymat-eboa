<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $table = 'note';
    //
    protected $fillable = [
        'anonymat_id', 'matiere_id','valeur'
    ];

    public function anonymat() {
        return $this->belongsTo(Anonymat::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }
}
