<?php

use App\Http\Controllers\Frontend\TdsController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use App\Http\Controllers\Frontend\RequestWithdrawalController;
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

// Route::get('create-transaction', [RazorpayPaymentController::class , 'addOrderProducts']);

Auth::routes(['register' => false, 'login' => false]);


Route::group(['middleware' => 'auth', 'as' => 'frontend.'], function () {
    Route::get('/dashboard', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/order-history', [ProfileController::class, 'orderHistory'])->name('profile.orderHistory');
    Route::get('/referral', [ProfileController::class, 'referralIndex'])->name('referralIndex');
    Route::get('/transaction', [ProfileController::class, 'transactionIndex'])->name('transactionIndex');

    Route::get('edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('update-additional-profile', [ProfileController::class, 'additionalUpdate'])->name('profile.additionalUpdate');
    Route::post('update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('edit-bank-details', [ProfileController::class, 'editBankDetails'])->name('profile.editBankDetails');
    Route::post('update-bank-details', [ProfileController::class, 'updateBankDetails'])->name('profile.updateBankDetails');

    Route::post('save-experience', [OrderController::class, 'saveExperience'])->name('order.saveExperience');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/shipping', [CheckoutController::class, 'shipping'])->name('shipping');

    Route::post('razorpay-order-create', [RazorpayPaymentController::class, 'orderCreate'])->name('razorpay.orderCreate');
    Route::post('razorpay-order-save', [RazorpayPaymentController::class, 'orderSave'])->name('razorpay.orderSave');

    Route::resource('address', AddressController::class);
    Route::resource('request-withdrawal', RequestWithdrawalController::class)->only('index', 'store');

    Route::get('tds-transaction/index', [TdsController::class, 'transactionsIndex'])->name('tds.transactionIndex');
    Route::get('tds-reports/index', [TdsController::class, 'reports'])->name('tds.reports');

    Route::get('/invoice/{order}', [OrderController::class, 'invoice'])->name('order.invoice');
});
