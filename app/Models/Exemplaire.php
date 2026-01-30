<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplaire extends Model
{
    protected $fillable = ['ouvrage_id'];

    public function ouvrage() {
        return $this->belongsTo(Ouvrage::class);
    }

    // public function emprunts() {
    //     return $this->hasMany(Emprunter::class);
    // }
}
