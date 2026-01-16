<?php

use App\Http\Middleware\AuthUser;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\VisitorMiddleware;
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


Route::middleware([GuestAdmin::class])->group(function () {

    Route::get('/', WelcomeIndex::class)->middleware(VisitorMiddleware::class)->name('welcome');

    Route::prefix('/items')->name('items.')->group(function () {
        Route::get('/', ItemsIndex::class)->name('index');
        Route::get('/{item}', ItemsShow::class)->name('show');
    })->middleware(VisitorMiddleware::class);


    Route::middleware([AuthUser::class, VisitorMiddleware::class])->group(function () {
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
