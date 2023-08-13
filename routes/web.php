<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**  WELCOME */
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/**  SHOP */
Route::get('/dashboard', [ShopController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{product:slug}', [ShopController::class, 'show'])->name('dashboard.show');

/**  SELL */
Route::resource('products', ProductController::class)->except(['update']);

Route::prefix('products')->group(function () {
    Route::put('/publish/{product}', [ProductController::class, 'publish'])->name('products.publish');
    Route::post('/update/{product}', [ProductController::class, 'update'])->name('products.update');
});

/**  CART */
Route::get('/cart', [CartController::class, 'index'])->name('cart');

/**  USER AUTH */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/Dashboard');
    })->name('dashboard');
});
