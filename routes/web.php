<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('profile.guest.welcome');
})->name('home');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ProfileController::class, 'edit'])->name('admin.partials.edit');
    Route::patch('/admin', [ProfileController::class, 'update'])->name('admin.partials.update');
    Route::delete('/admin', [ProfileController::class, 'destroy'])->name('admin.partials.destroy');
});

require __DIR__.'/auth.php';
