<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/login', [LoginController::class, 'view'])->name('login.view');
// Route::post('/login', [LoginController::class, 'loginAttempt'])->name('login');

Route::group(['as' => 'frontend.'], function () {

    // Route::post('/news-letter', [HomeController::class, 'newsLetter'])->name('newsletter');

    // Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/store/{product}', [CartController::class, 'store'])->name('cart.store');
    // Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    // Route::post('/cart/delete/{item}', [CartController::class, 'delete'])->name('cart.delete');


    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('category/{category}', [HomeController::class, 'category'])->name('category');
    // Route::get('/product/page', [ProductController::class, 'index'])->name('product.index');

    Route::get('/shop', [ProductController::class, 'shop'])->name('product.shop');
    Route::get('/product-detail/{product}', [ProductController::class, 'details'])->name('product.details');
    Route::get('/pages/{page?}', [PageController::class, 'view'])->name('page.view');

    // Route::post('create-checkout-session', [PaymentController::class, 'receivePayment'])->name('stripe.initialize');
    // Route::get('/pages/shipping-returns', [PageController::class, 'shippingReturns'])->name('shipping.return');
    // Route::get('/pages/about-us', [PageController::class, 'aboutUs'])->name('about.us');
});

// Route::group(['middleware' => 'auth', 'as' => 'frontend.'], function () {
//     Route::get('/dashboard', [ProfileController::class, 'show'])->name('profile.show');

//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
//     Route::get('/shipping', [CheckoutController::class, 'shipping'])->name('shipping');

//     Route::post('/save-shipping-details', [CheckoutController::class, 'saveShippingDetails'])->name('shipping.save');

//     // Route::post('/save-shipping-details', [CheckoutController::class, 'saveShippingDetails'])->name('shipping.save');
//     Route::get('stripe-success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
//     Route::get('stripe-cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');
// });
