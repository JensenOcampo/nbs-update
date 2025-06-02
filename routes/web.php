<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginRegController;
use App\Http\Controllers\GuestProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect', [HomeController::class, 'redirect']);

Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::get('/view_dashboard', [AdminController::class, 'view_dashboard'])->name('admin.home');
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

// Guest index page for viewing products and adding to cart
Route::get('/guest/products', [GuestProductController::class, 'index'])->name('guest.products');

Route::get('/products/search', [GuestProductController::class, 'search'])->name('products.search');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/', [GuestProductController::class, 'index'])->name('home');

// Login & Register routes using LoginRegController
Route::get('/login', [LoginRegController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginRegController::class, 'login']);

Route::get('/register', [LoginRegController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginRegController::class, 'register']);

Route::post('/logout', [LoginRegController::class, 'logout'])->name('logout');
