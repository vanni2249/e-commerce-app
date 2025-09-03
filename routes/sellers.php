<?php

use App\Http\Middleware\AuthSeller;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Livewire\Sellers\Dashboard\Index as DashboardIndex;
use App\Livewire\Sellers\Items\Index as ItemIndex;
use App\Livewire\Sellers\Items\Show as ItemShow;
use App\Livewire\Sellers\Items\Edit as ItemEdit;

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

        Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

        Route::prefix('/items')->name('items.')->group(function () {
            Route::get('/', ItemIndex::class)->name('index');
            Route::get('/{item}', ItemShow::class)->name('show');
            Route::get('/{item}/edit', ItemEdit::class)->name('edit');
        });
    });
});
