<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
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

Route::get('/login', [LoginController::class, 'view'])->name('login.view');
Route::post('/login', [LoginController::class, 'loginAttempt'])->name('login');

Route::group(['as' => 'frontend.'], function () {

    Route::get('/petraceuticals-schedule', [HomeController::class, 'petraceuticalsSchedule'])->name('petraceuticals-schedule');

    // Route::post('/news-letter', [HomeController::class, 'newsLetter'])->name('newsletter');

    Route::get('/contact-us', [ContactUsController::class, 'contactUsPage'])->name('contact-us.view');
    Route::post('/contact-us-save', [ContactUsController::class, 'contactUsSave'])->name('contact-us.save');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/delete/{item}', [CartController::class, 'delete'])->name('cart.delete');


    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('category/{category}', [HomeController::class, 'category'])->name('category');
    // Route::get('/product/page', [ProductController::class, 'index'])->name('product.index');

    Route::get('/shop', [ProductController::class, 'shop'])->name('product.shop');
    Route::get('/product-detail/{product}', [ProductController::class, 'details'])->name('product.details');
    Route::get('/pages/{page?}', [PageController::class, 'view'])->name('page.view');
    Route::get('/blogs/{blog}', [BlogController::class, 'view'])->name('blog.view');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

    Route::get('mail-template-order-create', [HomeController::class, 'orderCreateMail'])->name('mailTemplate.orderCreateMail');
    Route::get('order-completed', [HomeController::class, 'thankYouPage'])->name('thankYouPage');

});

Auth::routes(['register' => false, 'login' => false]);


Route::group(['middleware' => 'auth', 'as' => 'frontend.'], function () {
    Route::get('/dashboard', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/shipping', [CheckoutController::class, 'shipping'])->name('shipping');

    Route::post('razorpay-order-create', [RazorpayPaymentController::class, 'orderCreate'])->name('razorpay.orderCreate');
    Route::post('razorpay-order-save', [RazorpayPaymentController::class, 'orderSave'])->name('razorpay.orderSave');

});
