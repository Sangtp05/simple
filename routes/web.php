<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');

Route::get('/product/{categoryParent}', [CategoryController::class, 'showParent'])
    ->name('categories.parent.show');
Route::get('/product/{categoryParent}/{categoryChild}', [CategoryController::class, 'showChild'])
    ->name('categories.child.show');
Route::get('/product/{categoryParent}/{categoryChild}/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::middleware('guest:customer')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('customer.register.post');
});

Route::middleware('auth:customer')->group(function () {
    Route::get('/check-auth', [ProfileController::class, 'check'])->name('customer.checkAuth');
    Route::get('/profile', [ProfileController::class, 'show'])->name('customer.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('customer.profile.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('/cart/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');
});

Route::middleware('auth:customer')->group(function () {
    Route::get('/api/cart', [CartController::class, 'get'])->name('cart.get');
    Route::post('/api/cart/update', [CartController::class, 'update'])->name('cart.update');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/policy', [PageController::class, 'policy'])->name('policy');
