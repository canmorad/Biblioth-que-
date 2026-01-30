<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Ouvrage;
use App\Models\Role;
use App\Models\User;

class HomeController extends Controller
{
    public function dashboard()
    {
        $ouvrages = Ouvrage::all();
        $categories = Categorie::all();
        $adherentRoleId = Role::where('nom', 'Adhérent')->first()->id;
        $users = User::where('role_id', $adherentRoleId)->get();
        // compact('ouvrages', 'categories', 'users')
        return view('dashboard', ['ouvrages' => $ouvrages, 'categories' => $categories, 'users' => $users]);
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'categorie_id' => 'required',
            'nbrexemplaires' => 'required|integer'
        ]);

        Ouvrage::create($request->all());

        return redirect()->back()->with('success', 'Ouvrage ajouté avec succès!');
    }
}
