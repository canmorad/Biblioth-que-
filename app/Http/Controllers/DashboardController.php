<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Ouvrage;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ouvrages = Ouvrage::all();
        $categories = Categorie::all();
        $adherentRoleId = Role::where('nom', 'Adhérent')->first()->id;
        $users = User::where('role_id', $adherentRoleId)->get();

        return view('dashboard', compact('ouvrages', 'categories', 'users'));
    }
}
