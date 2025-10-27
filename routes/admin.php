<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\GuestAdmin;
use App\Http\Middleware\GuestSeller;
use App\Http\Middleware\GuestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

use App\Livewire\Admin\Dashboard\Index as DashboardIndex;

// use App\Livewire\Admin\Orders\Index as OrderIndex;
// use App\Livewire\Admin\Orders\Show as OrderShow;

use App\Livewire\Admin\Items\Index as ItemIndex;
use App\Livewire\Admin\Items\Create as ItemCreate;
use App\Livewire\AdminSeller\Items\Show as ItemShow;
use App\Livewire\AdminSeller\Items\Edit as ItemEdit;

use App\Livewire\AdminSeller\Products\Index as ProductIndex;
use App\Livewire\AdminSeller\Products\Show as ProductShow;

use App\Livewire\AdminSeller\Products\Inventories\Index as InventoryIndex;
use App\Livewire\AdminSeller\Products\Inventories\Show as InventoryShow;
use App\Livewire\AdminSeller\Products\Sales\Index as ProductSaleIndex;
use App\Livewire\AdminSeller\Products\Sales\Show as ProductSaleShow;

use App\Livewire\AdminSeller\Orders\Index as OrderIndex;
use App\Livewire\AdminSeller\Orders\Show as OrderShow;

use App\Livewire\AdminSeller\Sales\Index as SaleIndex;
use App\Livewire\AdminSeller\Sales\Show as SaleShow;



use App\Livewire\AdminSeller\Products\Refunds\Index as RefundIndex;

use App\Livewire\Admin\Users\Index as UserIndex;
use App\Livewire\Admin\Users\Show as UserShow;

use App\Livewire\Admin\Sellers\Index as SellerIndex;
use App\Livewire\Admin\Sellers\Show as SellerShow;

use App\Livewire\Admin\Admins\Index as AdminIndex;
use App\Livewire\Admin\Admins\Show as AdminShow;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware([GuestAdmin::class, GuestSeller::class, GuestUser::class])->group(function () {
        Route::get('/login', function () {
            return view('admin.auth.login');
        })->name('login');
    });

    Route::middleware([AuthAdmin::class])->group(function () {

        Route::get('/logout', function (Request $request) {
            // Logic for logging out the user
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login');
        })->name('logout');

        // Dashboard
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
        Route::get('/dashboard/filters/{filter}/values/{value}', DashboardIndex::class)->name('dashboard.filters');




        Route::prefix('/items')->name('items.')->group(function () {
            Route::get('/{shop}/{status}', ItemIndex::class)->name('index');
            // Route::get('/catalog', ItemIndex::class)->name('catalog');
            // Route::get('/inventories', ItemIndex::class)->name('inventories');
            Route::get('/create', ItemCreate::class)->name('create');
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

        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', UserIndex::class)->name('index');
            Route::get('/{user}', UserShow::class)->name('show');
        });

        Route::prefix('/sellers')->name('sellers.')->group(function () {
            Route::get('/', SellerIndex::class)->name('index');
            Route::get('/{seller}', SellerShow::class)->name('show');
        });
        
        Route::prefix('/admins')->name('admins.')->group(function () {
            Route::get('/', AdminIndex::class)->name('index');
            Route::get('/{admin}', AdminShow::class)->name('show');
        });
    });
});
