<?php

use App\Livewire\HomePage;
use App\Livewire\ProductList;
use App\Livewire\ProductDetail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', HomePage::class)->name('home');
Route::get('/products', ProductList::class)->name('product-list');
Route::get('/products/{slug}', ProductDetail::class)->name('product-detail');
Route::get('/new-arrivals', function () {
    return view('new-arrivals');
})->name('new-arrivals');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/payment/{order}', [CheckoutController::class, 'processPayment'])->name('checkout.process-payment');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});

// Account info page (authenticated)
Route::middleware('auth')->get('/account', [AccountController::class, 'info'])->name('account.info');
Route::middleware('auth')->get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
Route::middleware('auth')->get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
// Test route for Tailwind CSS v4.1 and Preline v3.1.0
Route::get('/test-tailwind-preline', function () {
    return view('test-tailwind-preline');
})->name('test.tailwind.preline');
