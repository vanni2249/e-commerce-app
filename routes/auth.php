<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use App\Http\Middleware\VisitorMiddleware;

use App\Livewire\Auth\Users\Login as UserLogin;
use App\Livewire\Auth\Users\Register as UserRegister;
use App\Livewire\Users\ThankYou\Index as ThankYou;

use App\Livewire\Auth\Sellers\Login as SellerLogin;

use App\Livewire\Users\Businesses\Register as BusinessRegister;

use App\Livewire\Auth\Admin\Login as AdminLogin;

// Authentication routes for users
Route::middleware([GuestUser::class, VisitorMiddleware::class])->group(function () {
    Route::get('/login', UserLogin::class)->name('login');

    Route::get('/register', UserRegister::class)->name('register');

    Route::get('/register/business', BusinessRegister::class)->name('register.business');

    Route::get('/thank-you', ThankYou::class)->withoutMiddleware([VisitorMiddleware::class])->name('thank-you');

});


// Authenticated routes for sellers
Route::prefix('sellers')->name('sellers.')->group(function () {
    Route::middleware([GuestAdmin::class, GuestSeller::class, GuestUser::class])->group(function () {
        Route::get('/login', SellerLogin::class)->name('login');
    });
});

// Authenticated routes for admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware([GuestAdmin::class, GuestSeller::class, GuestUser::class])->group(function () {
        Route::get('/login', AdminLogin::class)->name('login');
    });

});

Route::get('logout/{redirectRoute}', function (Request $request, $redirectRoute) {
    // Logic for logging out the user
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route($redirectRoute);
})->name('logout');