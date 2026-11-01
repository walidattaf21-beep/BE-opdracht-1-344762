<?php

use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\LeveringController;
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

// Alleen admin en magazijnmedewerker mogen het magazijn zien
Route::middleware(['auth', 'rol:admin,magazijnmedewerker'])->group(function () {
    Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index');
    Route::get('/magazijn/{productId}/levering', [MagazijnController::class, 'levering'])->whereNumber('productId')->name('magazijn.levering');
    Route::get('/magazijn/{productId}/allergenen', [MagazijnController::class, 'allergenen'])->whereNumber('productId')->name('magazijn.allergenen');
});

// Alleen admin mag het gebruikersoverzicht zien
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/gebruikers', [GebruikerController::class, 'index'])->name('gebruikers.index');
});

require __DIR__.'/auth.php';


// Opdracht 2 - Leveranciers en leveringen
Route::middleware('auth')->group(function () {
    Route::get('/leveranciers', [LeverancierController::class, 'overzicht'])->name('leverancier.overzicht');
    Route::get('/leveranciers/{leverancierId}/producten', [LeverancierController::class, 'geleverdeProducten'])->name('leverancier.geleverde-producten');
    Route::get('/leveranciers/{leverancierId}/producten/{productId}/levering', [LeveringController::class, 'formulier'])->name('levering.formulier');
    Route::post('/leveranciers/{leverancierId}/producten/{productId}/levering', [LeveringController::class, 'opslaan'])->name('levering.opslaan');
});
