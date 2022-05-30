<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Models\Category;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('about', function () {
        return Inertia::render('About');
    })->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('category', CategoryController::class, [
        'names' => [
            'index' => 'category.index',
            'show' => 'category.show',
            'create' => 'category.create',
            'store' => 'category.store',
            'edit' => 'category.edit',
            'update' => 'category.update'
        ]
    ]);

    Route::resource('product', ProductController::class, [
        'names' => [
            'index' => 'product.index',
            'show' => 'product.show',
            'create' => 'product.create',
            'store' => 'product.store',
            'edit' => 'product.edit',
            'update' => 'product.update'
        ]
    ]);

    Route::resource('order', OrderController::class, [
        'names' => [
            'index' => 'order.index',
            'show' => 'order.show',
            'create' => 'order.create',
            'store' => 'order.store',
            'edit' => 'order.edit',
            'update' => 'order.update'
        ]
    ]);

    Route::resource('purchase', PurchaseController::class, [
        'names' => [
            'index' => 'purchase.index',
            'show' => 'purchase.show',
            'create' => 'purchase.create',
            'store' => 'purchase.store',
            'edit' => 'purchase.edit',
            'update' => 'purchase.update'
        ]
    ]);
});
