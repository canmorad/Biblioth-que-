<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunter extends Model
{
    protected $fillable = ['adherent_id', 'exemplaire_id', 'dateemprunt', 'dateretour'];

    public function adherent() {
        return $this->belongsTo(Adherent::class);
    }

    public function exemplaire() {
        return $this->belongsTo(Exemplaire::class);
    }
}
