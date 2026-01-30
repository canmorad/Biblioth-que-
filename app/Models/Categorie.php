<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
   protected $fillable = ['nom'];

    public function ouvrages()
    {
        return $this->hasMany(Ouvrage::class, 'categorie_id');
    }
}
