<?php

use App\Livewire\HomePage;
use App\Livewire\ProductList;
use App\Livewire\ProductDetail;
use App\Livewire\Contact;
use App\Livewire\Shipping;
use App\Livewire\Returns;
use App\Livewire\Sizeguide;
use App\Livewire\Careers;
use App\Livewire\About;
use App\Livewire\Privacypolicy;
use App\Livewire\Termsofservice;
use App\Livewire\WishlistPage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', HomePage::class)->name('home');

// Product routes
Route::get('/products', ProductList::class)->name('product-list');
Route::get('/products/{slug}', ProductDetail::class)->name('product-detail');
Route::get('/new-arrivals', ProductList::class)->name('new-arrivals');

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

//Support routes
Route::get('/contact', Contact::class)->name('contact');
//::post('/contact', [Contact::class, 'submit'])->name('contact.submit');
Route::get('/shipping', Shipping::class)->name('shipping');
Route::get('/returns', Returns::class)->name('returns');
Route::get('/sizeguide', Sizeguide::class)->name('sizeguide');

//Company routes
Route::get('/about', About::class)->name('about');
Route::get('/careers', Careers::class)->name('careers');
Route::get('/privacy-policy', Privacypolicy::class)->name('privacy-policy');
Route::get('/terms-of-service', Termsofservice::class)->name('terms-of-service');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin login routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

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
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', \App\Livewire\WishlistPage::class)->name('wishlist');
});

// Test routes for session verification
Route::get('/test/user-session', function () {
    return response()->json([
        'user_authenticated' => Auth::guard('web')->check(),
        'user_id' => Auth::guard('web')->id(),
        'user_name' => Auth::guard('web')->user()?->name,
        'admin_authenticated' => Auth::guard('admin')->check(),
        'admin_id' => Auth::guard('admin')->id(),
        'admin_name' => Auth::guard('admin')->user()?->name,
        'session_id' => session()->getId(),
    ]);
})->name('test.user-session');

Route::get('/test/admin-session', function () {
    return response()->json([
        'user_authenticated' => Auth::guard('web')->check(),
        'user_id' => Auth::guard('web')->id(),
        'user_name' => Auth::guard('web')->user()?->name,
        'admin_authenticated' => Auth::guard('admin')->check(),
        'admin_id' => Auth::guard('admin')->id(),
        'admin_name' => Auth::guard('admin')->user()?->name,
        'session_id' => session()->getId(),
    ]);
})->name('test.admin-session');

// Test route for Tailwind CSS v4.1 and Preline v3.1.0
Route::get('/test', function () {
    return view('test-tailwind-preline');
})->name('test.tailwind.preline');
