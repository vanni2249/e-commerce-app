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

use App\Livewire\AdminSeller\Products\Index as ProductIndex;
use App\Livewire\AdminSeller\Products\Show as ProductShow;

use App\Livewire\AdminSeller\Products\Inventories\Index as InventoryIndex;
use App\Livewire\AdminSeller\Products\Inventories\Show as InventoryShow;
use App\Livewire\AdminSeller\Products\Sales\Index as ProductSaleIndex;
use App\Livewire\AdminSeller\Products\Refunds\Index as RefundIndex;

use App\Livewire\AdminSeller\Orders\Index as OrderIndex;
use App\Livewire\AdminSeller\Orders\Show as OrderShow;

use App\Livewire\AdminSeller\Sales\Index as SaleIndex;
use App\Livewire\AdminSeller\Sales\Show as SaleShow;


Route::prefix('/sellers')->name('sellers.')->group(function () {

    Route::middleware([AuthSeller::class])->group(function () {

        Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

        Route::prefix('/items')->name('items.')->group(function () {
            Route::get('/', ItemIndex::class)->name('index');
            Route::get('/catalog', ItemIndex::class)->name('catalog');
            Route::get('/inventories', ItemIndex::class)->name('inventories');
            Route::get('/{item}', ItemShow::class)->name('show');
            Route::get('/{item}/edit', ItemEdit::class)->name('edit');
        });

        Route::prefix('/products')->name('products.')->group(function () {
            Route::get('/', ProductIndex::class)->name('index');
            Route::get('/{product}', ProductShow::class)->name('show');

            Route::prefix('/{product}/inventories')->name('inventories.')->group(function () {
                Route::get('/', InventoryIndex::class)->name('index');
                Route::get('/{inventory}', InventoryShow::class)->name('show');
            });

            Route::prefix('/{product}/sales')->name('sales.')->group(function () {
                Route::get('/', ProductSaleIndex::class)->name('index');
            });

            Route::prefix('/{product}/refunds')->name('refunds.')->group(function () {
                Route::get('/', RefundIndex::class)->name('index');
            });
        });

        Route::prefix('/orders')->name('orders.')->group(function () {
            Route::get('/', OrderIndex::class)->name('index');
            Route::get('/{order}', OrderShow::class)->name('show');
        });

        Route::prefix('/sales')->name('sales.')->group(function () {
            Route::get('/', SaleIndex::class)->name('index');
            Route::get('/{sale}', SaleShow::class)->name('show');
        });
    });
});
