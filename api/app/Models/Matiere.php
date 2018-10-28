<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //protected $timestamps = false;
    protected $table = 'matiere';
    //
    protected $fillable = [
        'option_id', 'epreuve_id', 'label', 'desc'
    ];

    public function epreuve() {
        return $this->belongsTo(Epreuve::class);
    }

    public function option() {
        return $this->belongsTo(Option::class);
    }

    /*public function user() {
        return $this->belongsTo(User::class, 'author');
    }

    public function elements() {
        return $this->hasMany(Note::class, 'content', 'id');
    }
    public function likes() {
        return $this->hasMany(Like::class, 'content', 'id');
    }
    public function comments() {
        return $this->hasMany(Filiere::class, 'content', 'id');
    }
    public function follows() {
        return $this->hasMany(Eleve::class, 'content', 'id');
    }*/
}
