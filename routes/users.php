<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthSeller;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([GuestAdmin::class, GuestSeller::class])->group(function () {

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

    
    Route::middleware([GuestUser::class])->group(function () {
        Route::get('/login', function () {
            return view('users.auth.login');
        })->name('login');

        Route::get('/register', function () {
            return view('users.auth.register');
        })->name('register');
    });

    Route::middleware([AuthUser::class])->group(function () {

        Route::get('/logout', function (Request $request) {
            // Logic for logging out the user
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        })->name('logout');
        
        Route::get('/cart', function () {
            return view('users.cart.index');
        })->name('cart');

        Route::get('/checkout', function () {
            return view('users.checkout.index');
        })->name('checkout');

        Route::get('/completed/orders/{order}', function (Order $order) {
            return view('users.completed.index', ['order' => $order]);
        })->name('completed');

        Route::prefix('/orders')->name('orders.')->group(function () {
            Route::get('/', function () {
                return view('users.orders.index');
            })->name('index');
            Route::get('/{order}', function (Order $order) {
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
    });
});
