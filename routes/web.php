<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\OrderController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{categoryParent}', [CategoryController::class, 'showParent'])
    ->name('categories.parent.show');
Route::get('/categories/{categoryParent}/{categoryChild}', [CategoryController::class, 'showChild'])
    ->name('categories.child.show');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Routes cho khách chưa đăng nhập
Route::middleware('guest:customer')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('customer.register.post');
});

// Routes cho khách đã đăng nhập
Route::middleware('auth:customer')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('customer.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('customer.profile.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');
});
