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

use App\Livewire\Admin\Orders\Index as OrderIndex;
use App\Livewire\Admin\Orders\Show as OrderShow;

use App\Livewire\Admin\Items\Index as ItemIndex;
use App\Livewire\Admin\Items\Create as ItemCreate;
use App\Livewire\Admin\Items\Show as ItemShow;
use App\Livewire\Admin\Items\Edit as ItemEdit;

use App\Livewire\Admin\Users\Index as UserIndex;
use App\Livewire\Admin\Users\Show as UserShow;


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


        Route::prefix('/orders')->name('orders.')->group(function () {
            Route::get('/', OrderIndex::class)->name('index');
            Route::get('/{order}', OrderShow::class)->name('show');
            // Route::get('/', function () {
            //     return view('admin.orders.index');
            // })->name('index');

            // Route::get('/{order}', function ($order) {
            //     return view('admin.orders.show', ['order' => $order]);
            // })->name('show');
        });

        Route::prefix('/items')->name('items.')->group(function () {
            Route::get('/', ItemIndex::class)->name('index');
            Route::get('/create', ItemCreate::class)->name('create');
            Route::get('/{item}', ItemShow::class)->name('show');
            Route::get('/{item}/edit', ItemEdit::class)->name('edit');
            // Route::get('/', function () {
            //     return view('admin.items.index');
            // })->name('index');
            // Route::get('/{item}', [ItemController::class, 'show'])->name('show');
        });

        Route::prefix('/products')->name('products.')->group(function () {
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

        Route::prefix('/sales')->name('sales.')->group(function () {
            Route::get('/', function () {
                return view('admin.sales.index');
            })->name('index');

            Route::get('/{sale}', function ($sale) {
                return view('admin.sales.show', ['sale' => $sale]);
            })->name('show');
        });

        Route::prefix('/refunds')->name('refunds.')->group(function () {
            Route::get('/', function () {
                return view('admin.refunds.index');
            })->name('index');

            Route::get('/{refund}', function ($refund) {
                return view('admin.refunds.show', ['refund' => $refund]);
            })->name('show');
        });

        Route::prefix('/claims')->name('claims.')->group(function () {
            Route::get('/', function () {
                return view('admin.claims.index');
            })->name('index');

            Route::get('/{claim}', function ($claim) {
                return view('admin.claims.show', ['claim' => $claim]);
            })->name('show');
        });
        Route::prefix('/returns')->name('returns.')->group(function () {
            Route::get('/', function () {
                return view('admin.returns.index');
            })->name('index');

            Route::get('/{return}', function ($return) {
                return view('admin.returns.show', ['return' => $return]);
            })->name('show');
        });
        Route::prefix('/refunds')->name('refunds.')->group(function () {
            Route::get('/', function () {
                return view('admin.refunds.index');
            })->name('index');

            Route::get('/{refund}', function ($refund) {
                return view('admin.refunds.show', ['refund' => $refund]);
            })->name('show');
        });
        Route::prefix('/replacements')->name('replacements.')->group(function () {
            Route::get('/', function () {
                return view('admin.replacements.index');
            })->name('index');

            Route::get('/{replacement}', function ($replacement) {
                return view('admin.replacements.show', ['replacement' => $replacement]);
            })->name('show');
        });

        Route::prefix('/ratings')->name('ratings.')->group(function () {
            Route::get('/', function () {
                return view('admin.ratings.index');
            })->name('index');

            Route::get('/{rating}', function ($rating) {
                return view('admin.ratings.show', ['rating' => $rating]);
            })->name('show');
        });

        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', UserIndex::class)->name('index');
            Route::get('/{user}', UserShow::class)->name('show');
            // Route::get('/', function () {
            //     return view('admin.users.index');
            // })->name('index');

            // Route::get('/{user}', function ($user) {
            //     return view('admin.users.show', ['user' => $user]);
            // })->name('show');
        });
        Route::prefix('/sellers')->name('sellers.')->group(function () {
            Route::get('/', function () {
                return view('admin.sellers.index');
            })->name('index');

            Route::get('/{seller}', function ($seller) {
                return view('admin.sellers.show', ['seller' => $seller]);
            })->name('show');
        });
        Route::prefix('/admins')->name('admins.')->group(function () {
            Route::get('/', function () {
                return view('admin.admins.index');
            })->name('index');

            Route::get('/{admin}', function ($admin) {
                return view('admin.admins.show', ['admin' => $admin]);
            })->name('show');
        });
    });
});
