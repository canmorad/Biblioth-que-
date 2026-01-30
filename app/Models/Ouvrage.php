<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    protected $fillable = ['auteur', 'titre', 'nbrexemplaires', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function exemplaires()
    {
        return $this->hasMany(Exemplaire::class);
    }
}
