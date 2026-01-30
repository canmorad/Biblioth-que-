<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $fillable = ['user_id', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunter::class);
    }
}
