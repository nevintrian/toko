<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\Home\HomeContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\HomeFaqController;
use App\Http\Controllers\Home\HomeProductController;
use App\Http\Controllers\Home\HomeProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/faq', [HomeFaqController::class, 'index'])->name('home.faq');
Route::get('/home/about', [HomeAboutController::class, 'index'])->name('home.about');
Route::get('/home/product', [HomeProductController::class, 'index'])->name('home.product');
Route::get('/home/products', [HomeProductsController::class, 'index'])->name('home.products');
Route::get('/home/contact', [HomeContactCOntroller::class, 'index'])->name('home.contact');


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('about', function () {
        return Inertia::render('About');
    })->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('category', CategoryController::class, [
        'names' => [
            'index' => 'category.index',
            'show' => 'category.show',
            'create' => 'category.create',
            'store' => 'category.store',
            'edit' => 'category.edit',
            'update' => 'category.update',
            'destroy' => 'category.destroy'
        ]
    ]);

    Route::resource('product', ProductController::class, [
        'names' => [
            'index' => 'product.index',
            'show' => 'product.show',
            'create' => 'product.create',
            'store' => 'product.store',
            'edit' => 'product.edit',
            'update' => 'product.update',
            'destroy' => 'product.destroy'
        ]
    ]);

    Route::resource('order', OrderController::class, [
        'names' => [
            'index' => 'order.index',
            'show' => 'order.show',
            'create' => 'order.create',
            'store' => 'order.store',
            'edit' => 'order.edit',
            'update' => 'order.update',
            'destroy' => 'order.destroy'
        ]
    ]);

    Route::resource('purchase', PurchaseController::class, [
        'names' => [
            'index' => 'purchase.index',
            'show' => 'purchase.show',
            'create' => 'purchase.create',
            'store' => 'purchase.store',
            'edit' => 'purchase.edit',
            'update' => 'purchase.update',
            'destroy' => 'purchase.destroy'
        ]
    ]);
});
