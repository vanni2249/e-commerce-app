<?php

use App\Http\Middleware\AuthSeller;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::prefix('/sellers')->name('sellers.')->group(function () {

    Route::middleware([GuestSeller::class, GuestAdmin::class, GuestUser::class])->group(function () {
        Route::get('/login', function () {
            return view('sellers.auth.login');
        })->name('login');
    });

    Route::middleware([AuthSeller::class])->group(function () {
        Route::get('/logout', function (Request $request) {
            // Logic for logging out the user
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('sellers.login');
        })->name('logout');

        Route::get('/dashboard', function () {
            return view('sellers.dashboard');
        })->name('dashboard');
    });
});
