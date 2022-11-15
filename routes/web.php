<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Home\HomeAboutController;
use App\Http\Controllers\Home\HomeContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\HomeFaqController;
use App\Http\Controllers\Home\HomeIndexController;
use App\Http\Controllers\Home\HomeProductController;
use App\Http\Controllers\Home\HomeProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Models\Purchase;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [HomeIndexController::class, 'index'])->name('home');
Route::get('/home/faq', [HomeFaqController::class, 'index'])->name('home.faq');
Route::get('/home/about', [HomeAboutController::class, 'index'])->name('home.about');
Route::get('/home/product/{id}', [HomeProductController::class, 'index'])->name('home.product');
Route::get('/home/products', [HomeProductsController::class, 'index'])->name('home.products');
Route::get('/home/contact', [HomeContactCOntroller::class, 'index'])->name('home.contact');


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('about', function () {
        return Inertia::render('About');
    })->name('about');



    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::resource('home', HomeController::class, [
        'names' => [
            'index' => 'home.index',
            'show' => 'home.show',
            'create' => 'home.create',
            'store' => 'home.store',
            'edit' => 'home.edit',
            'update' => 'home.update',
            'destroy' => 'home.destroy'
        ]
    ]);

    Route::resource('faq', FaqController::class, [
        'names' => [
            'index' => 'faq.index',
            'show' => 'faq.show',
            'create' => 'faq.create',
            'store' => 'faq.store',
            'edit' => 'faq.edit',
            'update' => 'faq.update',
            'destroy' => 'faq.destroy'
        ]
    ]);

    Route::resource('about', AboutController::class, [
        'names' => [
            'index' => 'about.index',
            'show' => 'about.show',
            'create' => 'about.create',
            'store' => 'about.store',
            'edit' => 'about.edit',
            'update' => 'about.update',
            'destroy' => 'about.destroy'
        ]
    ]);

    Route::resource('contact', ContactController::class, [
        'names' => [
            'index' => 'contact.index',
            'show' => 'contact.show',
            'create' => 'contact.create',
            'store' => 'contact.store',
            'edit' => 'contact.edit',
            'update' => 'contact.update',
            'destroy' => 'contact.destroy'
        ]
    ]);

    Route::resource('user', UserController::class, [
        'names' => [
            'index' => 'user.index',
            'show' => 'user.show',
            'create' => 'user.create',
            'store' => 'user.store',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy'
        ]
    ]);

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

    Route::get('orders/print_pdf', [OrderController::class, 'print_pdf'])->name('order.print');
    Route::get('purchases/print_pdf', [PurchaseController::class, 'print_pdf'])->name('purchase.print');
});
