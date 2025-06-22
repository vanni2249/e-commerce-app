<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('customers.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('customers.auth.register');
})->name('register');

Route::get('/logout', function (Request $request) {
    // Logic for logging out the user
    Auth::logout();
    $request->session()->invalidate();  
    $request->session()->regenerateToken();
 
    return redirect('/');
})->name('logout');

Route::get('/', function () {
    return view('customers.welcome');
})->name('welcome');

Route::prefix('/items')->name('items.')->group(function () {
    Route::get('/', function () {
        return view('customers.items.index');
    });

    Route::get('/{item}', function ($item) {
        return view('customers.items.show', ['item' => $item]);
    })->name('show');
});

Route::get('/cart', function () {
    return view('customers.cart.index');
})->name('cart');

Route::get('/checkout', function () {
    return view('customers.checkout.index');
})->name('checkout');

Route::get('/completed', function () {
    return view('customers.completed.index');
})->name('completed');

Route::prefix('/orders')->name('orders.')->group(function () {
    Route::get('/', function () {
        return view('customers.orders.index');
    })->name('index');
    Route::get('/{order}', function ($order) {
        return view('customers.orders.show', ['order' => $order]);
    })->name('show');
});

Route::get('/favorites', function () {
    return view('customers.favorites.index');
})->name('favorites.index');

Route::get('/addresses', function () {
    return view('customers.addresses.index');
})->name('addresses.index');

Route::get('/profile', function () {
    return view('customers.profile.index');
})->name('profile.index');