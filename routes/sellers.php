<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/sellers')->name('sellers.')->group(function(){
    Route::get('/login', function () {
        return view('sellers.auth.login');
    })->name('login');

    Route::get('/dashboard', function () {
        return view('sellers.dashboard');
    })->name('dashboard');
});