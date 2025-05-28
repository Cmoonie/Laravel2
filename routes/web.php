<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\AdminFestivalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CoinController;

Route::get('/coins/buy', [CoinController::class, 'create'])->name('coins.buy');
Route::post('/coins/buy', [CoinController::class, 'store'])->name('coins.store');

Route::get('/', function () {
    return view('profile.guest.welcome');
})->name('home');;

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->is_admin) {
        return view('admin.dashboard');
    }

    // Haal de festivals op via orders
    $orders = $user->orders()->with('festival')->get();

    return view('profile.guest.dashboard', compact('user', 'orders'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'dashboard'])->name('profile');

    Route::middleware(['auth'])->group(function () {
        Route::resource('festivals', FestivalController::class);
        Route::get('admin/festivals', [AdminFestivalController::class, 'index'])->name('admin.festivals.index');
    });

    Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.public.index');

// Winkelmandje routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{festival}', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/remove/{festival}', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    });

    Route::get('/admin/orders', function () {
        $orders = \App\Models\Order::all();
        return view('admin.orders.index', compact('orders'));
    })->middleware(['auth'])->name('admin.orders.index');
});

    require __DIR__ . '/auth.php';
