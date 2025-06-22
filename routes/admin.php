<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('login');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::prefix('/orders')->name('orders.')->group(function () {
        Route::get('/', function () {
            return view('admin.orders.index');
        })->name('index');

        Route::get('/{order}', function ($order) {
            return view('admin.orders.show', ['order' => $order]);
        })->name('show');
    });

    Route::prefix('/items')->name('items.')->group(function () {
        Route::get('/', function () {
            return view('admin.items.index');
        })->name('index');

        Route::get('/{item}', function ($item) {
            return view('admin.items.show', ['item' => $item]);
        })->name('show');
    });

    Route::prefix('/products')->name('products.')->group(function(){
        Route::get('/', function () {
            return view('admin.products.index');
        })->name('index');
    
        Route::get('/{product}', function ($product) {
            return view('admin.products.show', ['product' => $product]);
        })->name('show');

        Route::prefix('/{product}/inventories')->name('inventories.')->group(function () {
            Route::get('/', function ($product) {
                return view('admin.products.inventories.index', ['product' => $product]);
            })->name('index');
            Route::get('/create', function ($product) {
                return view('admin.products.inventories.create', ['product' => $product]);
            })->name('create');
            Route::get('/{inventory}/edit', function ($product, $inventory) {
                return view('admin.products.inventories.edit', ['product' => $product, 'inventory' => $inventory]);
            })->name('edit');
        });

        Route::prefix('/{product}/sales')->name('sales.')->group(function () {
            Route::get('/', function ($product) {
                return view('admin.products.sales.index', ['product' => $product]);
            })->name('index');
        });

    });
    
    Route::prefix('/sales')->name('sales.')->group(function(){
        Route::get('/', function () {
            return view('admin.sales.index');
        })->name('index');
    
        Route::get('/{sale}', function ($sale) {
            return view('admin.sales.show', ['sale' => $sale]);
        })->name('show');
    });

    Route::prefix('/refunds')->name('refunds.')->group(function(){
        Route::get('/', function () {
            return view('admin.refunds.index');
        })->name('index');
    
        Route::get('/{refund}', function ($refund) {
            return view('admin.refunds.show', ['refund' => $refund]);
        })->name('show');
    });

    Route::prefix('/claims')->name('claims.')->group(function(){
        Route::get('/', function () {
            return view('admin.claims.index');
        })->name('index');
    
        Route::get('/{claim}', function ($claim) {
            return view('admin.claims.show', ['claim' => $claim]);
        })->name('show');
    });
    Route::prefix('/returns')->name('returns.')->group(function(){
        Route::get('/', function () {
            return view('admin.returns.index');
        })->name('index');
    
        Route::get('/{return}', function ($return) {
            return view('admin.returns.show', ['return' => $return]);
        })->name('show');
    });
    Route::prefix('/refunds')->name('refunds.')->group(function(){
        Route::get('/', function () {
            return view('admin.refunds.index');
        })->name('index');
    
        Route::get('/{refund}', function ($refund) {
            return view('admin.refunds.show', ['refund' => $refund]);
        })->name('show');
    });
    Route::prefix('/replacements')->name('replacements.')->group(function(){
        Route::get('/', function () {
            return view('admin.replacements.index');
        })->name('index');
    
        Route::get('/{replacement}', function ($replacement) {
            return view('admin.replacements.show', ['replacement' => $replacement]);
        })->name('show');
    });

    Route::prefix('/ratings')->name('ratings.')->group(function(){
        Route::get('/', function () {
            return view('admin.ratings.index');
        })->name('index');
    
        Route::get('/{rating}', function ($rating) {
            return view('admin.ratings.show', ['rating' => $rating]);
        })->name('show');
    });

    Route::prefix('/customers')->name('customers.')->group(function () {
        Route::get('/', function () {
            return view('admin.customers.index');
        })->name('index');

        Route::get('/{customer}', function ($customer) {
            return view('admin.customers.show', ['customer' => $customer]);
        })->name('show');
    });
});