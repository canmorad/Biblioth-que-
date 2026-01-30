<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use App\Models\Exemplaire;
use Illuminate\Support\Facades\Hash;

class OuvrageController extends Controller
{
    // Ajouter un ouvrage
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'categorie_id' => 'required',
            'nbrexemplaires' => 'required|integer'
        ]);

        // $titre = $formFields['titre'];
        // dd(Hash::make($titre));
        // // dd($formFields);

        $ouvrage = Ouvrage::create($request->all());

        for ($i = 1; $i <= $request->nbrexemplaires; $i++) {
            Exemplaire::create([
                'ouvrage_id' => $ouvrage->id,
                'code' => 'EX-' . $ouvrage->id . '-' . $i,
            ]);
        }

        return redirect()->back();
    }
}
