<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Adherent;
use App\Models\Role;

class AdherentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:adherents,email'
        ]);

        $roleId = Role::where('nom', 'Adhérent')->first()->id;
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'motDePasse' => '',
            'role_id' => $roleId
        ]);

        Adherent::create([
            'user_id' => $user->id,
            'email' => $request->email
        ]);

        return redirect()->back();
    }
}
