<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\AdminFestivalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('profile.guest.welcome');
})->name('home');;

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return view('admin.dashboard');
    } else {
        return view('profile.guest.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('festivals', FestivalController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/festivals', [AdminFestivalController::class, 'index'])->name('admin.festivals.index');
});

Route::get('/festivals', [FestivalController::class, 'userIndex'])->name('festivals.public.index');

// Winkelmandje routes
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{festival}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{festival}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/admin/orders', function () {
    $orders = \App\Models\Order::all();
    return view('admin.orders.index', compact('orders'));
})->middleware(['auth'])->name('admin.orders.index');


require __DIR__.'/auth.php';
