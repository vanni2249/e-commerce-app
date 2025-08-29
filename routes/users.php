<?php

use App\Http\Middleware\AuthUser;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Livewire\Users\Welcome\Index as WelcomeIndex;
use App\Livewire\Users\Items\Index as ItemsIndex;
use App\Livewire\Users\Items\Show as ItemsShow;
use App\Livewire\Users\Carts\Index as CartIndex;
use App\Livewire\Users\Checkout\Index as CheckoutIndex;
use App\Livewire\Users\Completed\Index as CompletedIndex;
use App\Livewire\Users\Orders\Index as OrderIndex;
use App\Livewire\Users\Orders\Show as OrderShow;
use App\Livewire\Users\Favorites\Index as FavoritesIndex;
use App\Livewire\Users\Addresses\Index as AddressesIndex;
use App\Livewire\Users\Profile\Index as ProfileIndex;


Route::middleware([GuestAdmin::class, GuestSeller::class])->group(function () {
    Route::get('/', WelcomeIndex::class)->name('welcome');

    Route::prefix('/items')->name('items.')->group(function () {
        Route::get('/', ItemsIndex::class)->name('index');
        Route::get('/{item}', ItemsShow::class)->name('show');
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
        
        Route::get('/carts', CartIndex::class)->name('cart');
        Route::get('/checkouts', CheckoutIndex::class)->name('checkout');
        Route::get('/completed/orders/{order}', CompletedIndex::class)->name('completed');

        Route::prefix('/orders')->name('orders.')->group(function () {
            Route::get('/', OrderIndex::class)->name('index');
            Route::get('/{order}', OrderShow::class)->name('show');
        });

        Route::get('/favorites', FavoritesIndex::class)->name('favorites');
        Route::get('/addresses', AddressesIndex::class)->name('addresses');
        Route::get('/profile', ProfileIndex::class)->name('profile');
    });
});
