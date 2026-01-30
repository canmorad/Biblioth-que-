<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\AdherentController;
use Illuminate\Http\Request;

Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::post('ouvrages', [OuvrageController::class,'store'])->name("ouvrages.store");
Route::post('adherents', [AdherentController::class,'store'])->name("adherents.store");
