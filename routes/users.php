<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('users.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('users.auth.register');
})->name('register');

Route::get('/logout', function (Request $request) {
    // Logic for logging out the user
    Auth::logout();
    $request->session()->invalidate();  
    $request->session()->regenerateToken();
 
    return redirect('/');
})->name('logout');

Route::get('/', function () {
    return view('users.welcome');
})->name('welcome');

Route::prefix('/items')->name('items.')->group(function () {
    Route::get('/', function () {
        return view('users.items.index');
    });

    Route::get('/{item}', function ($item) {
        return view('users.items.show', ['item' => $item]);
    })->name('show');
});

Route::get('/cart', function () {
    return view('users.cart.index');
})->name('cart');

Route::get('/checkout', function () {
    return view('users.checkout.index');
})->name('checkout');

Route::get('/completed', function () {
    return view('users.completed.index');
})->name('completed');

Route::prefix('/orders')->name('orders.')->group(function () {
    Route::get('/', function () {
        return view('users.orders.index');
    })->name('index');
    Route::get('/{order}', function ($order) {
        return view('users.orders.show', ['order' => $order]);
    })->name('show');
});

Route::get('/favorites', function () {
    return view('users.favorites.index');
})->name('favorites.index');

Route::get('/addresses', function () {
    return view('users.addresses.index');
})->name('addresses.index');

Route::get('/profile', function () {
    return view('users.profile.index');
})->name('profile.index');