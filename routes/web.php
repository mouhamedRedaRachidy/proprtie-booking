<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Page d'accueil + liste des propriétés
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Routes protégées (authentification requise)
Route::middleware('auth')->group(function () {
    // Formulaire de réservation
    Route::get('/bookings/create/{property}', [BookingController::class, 'create'])->name('bookings.create');
});
require __DIR__.'/auth.php';
