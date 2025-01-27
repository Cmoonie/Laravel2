<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ttgController;
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
    Route::get('/dashboard', [ttgController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [ttgController::class, 'show'])->name('dashboard');
    Route::get('/ttg', [ttgController::class, 'index'])->name('ttg.index'); // Read
    Route::get('/ttg/create', [ttgController::class, 'create'])->name('ttg.create'); // Form voor Create
    Route::post('/ttg', [ttgController::class, 'store'])->name('ttg.store'); // Opslaan van nieuwe gegevens
    Route::get('/ttg/{ttg}/edit', [ttgController::class, 'edit'])->name('ttg.edit'); // Form voor Update
    Route::put('/ttg/{ttg}', [ttgController::class, 'update'])->name('ttg.update'); // Opslaan van wijzigingen
    Route::delete('/ttg/{ttg}', [ttgController::class, 'destroy'])->name('ttg.destroy'); // Verwijderen
});

require __DIR__.'/auth.php';
