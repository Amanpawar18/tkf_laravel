<?php

use App\Http\Controllers\Backend\Auth\AdminAuthController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\FooterDataController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProductBenefitController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductFaqController;
use App\Http\Controllers\Backend\ProductVariationController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\Backend\QuizTwoQuestionsController;
use App\Http\Controllers\Backend\RequestWithdrawalController;
use App\Http\Controllers\Backend\ResultController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ShoesController;
use App\Http\Controllers\Backend\TdsController;
use App\Http\Controllers\Backend\UserController;
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

// Testing for the dev branch

Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/', [AdminAuthController::class, 'login'])->name('login');
Route::post('/password/request', [AdminAuthController::class, 'login'])->name('password.request');

Route::group(['middleware' => 'admin'], function () {
    // Route::group([],function () {

    Route::resource('user', UserController::class);

    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');


    Route::get('settings', [SettingsController::class, 'view'])->name('settings');
    Route::post('settings-update', [SettingsController::class, 'update'])->name('settings.update');

    Route::resource('category', CategoryController::class);
    Route::get('add-sub-category/{category}/add', [CategoryController::class, 'addSubCategory'])->name('subcategory.add');
    Route::get('edit-sub-category/{category}/edit', [CategoryController::class, 'edit'])->name('subcategory.edit');
    // Route::post('add-sub-category/{category}/store', [CategoryController::class, 'storeSubCategory'])->name('subcategory.store');
    Route::get('sub-category/{category}/index', [CategoryController::class, 'subCategoryIndex'])->name('subcategory.index');

    Route::resource('newsletter', NewsletterController::class)->only('index', 'destroy');

    Route::resource('product', ProductController::class);
    Route::post('product-image', [ProductController::class, 'deleteProductImage'])->name('product.deleteImage');
    Route::post('status/product/{product}', [ProductController::class, 'status'])->name('product.status');
    Route::post('get-subcategory', [ProductController::class, 'getSubCategory'])->name('product.getSubCategory');

    Route::get('product-faq/{product}', [ProductFaqController::class, 'index'])->name('product-faq.index');
    Route::get('product-faq/{product}/create', [ProductFaqController::class, 'create'])->name('product-faq.create');
    Route::get('product-faq/{product}/edit/{productFaq}', [ProductFaqController::class, 'edit'])->name('product-faq.edit');
    Route::post('product-faq/{product}/store', [ProductFaqController::class, 'store'])->name('product-faq.store');
    Route::post('product-faq/{product}/update/{productFaq}', [ProductFaqController::class, 'update'])->name('product-faq.update');
    Route::post('product-faq/{product}/destroy/{productFaq}', [ProductFaqController::class, 'destroy'])->name('product-faq.destroy');

    Route::get('product-benefit/{product}', [ProductBenefitController::class, 'index'])->name('product-benefit.index');
    Route::get('product-benefit/{product}/create', [ProductBenefitController::class, 'create'])->name('product-benefit.create');
    Route::get('product-benefit/{product}/edit/{productBenefit}', [ProductBenefitController::class, 'edit'])->name('product-benefit.edit');
    Route::post('product-benefit/{product}/store', [ProductBenefitController::class, 'store'])->name('product-benefit.store');
    Route::post('product-benefit/{product}/update/{productBenefit}', [ProductBenefitController::class, 'update'])->name('product-benefit.update');
    Route::post('product-benefit/{product}/destroy/{productBenefit}', [ProductBenefitController::class, 'destroy'])->name('product-benefit.destroy');

    Route::get('product-variation/{product}', [ProductVariationController::class, 'index'])->name('product-variation.index');
    Route::get('product-variation/{product}/create', [ProductVariationController::class, 'create'])->name('product-variation.create');
    Route::get('product-variation/{product}/edit/{productVariation}', [ProductVariationController::class, 'edit'])->name('product-variation.edit');
    Route::post('product-variation/{product}/store', [ProductVariationController::class, 'store'])->name('product-variation.store');
    Route::post('product-variation/{product}/update/{productVariation}', [ProductVariationController::class, 'update'])->name('product-variation.update');
    Route::post('product-variation/{product}/destroy/{productVariation}', [ProductVariationController::class, 'destroy'])->name('product-variation.destroy');
    Route::post('product-variation/destroy-images', [ProductVariationController::class, 'destroyImage'])->name('product-variation.destroyImage');

    Route::resource('orders', OrderController::class);
    Route::resource('pages', PageController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('image', ImageController::class);

    Route::get('contact-us-leads', [ContactUsController::class, 'index'])->name('contactUs.index');
    Route::get('contact-us-leads-view/{contactUs}', [ContactUsController::class, 'view'])->name('contactUs.view');
    Route::post('contact-us-leads-delete/{contactUs}', [ContactUsController::class, 'destroy'])->name('contactUs.destroy');

    Route::get('edit-home-page-data', [HomeController::class, 'edit'])->name('home-page.edit');
    Route::post('update-home-page-data', [HomeController::class, 'update'])->name('home-page.update');

    Route::get('edit-footer-data', [FooterDataController::class, 'edit'])->name('footer-data.edit');
    Route::post('update-footer-data', [FooterDataController::class, 'update'])->name('footer-data.update');

    Route::get('request-withdrawal', [RequestWithdrawalController::class, 'index'])->name('request-withdrawal.index');
    Route::get('request-withdrawal/edit/{requestWithdrawal}', [RequestWithdrawalController::class, 'edit'])->name('request-withdrawal.edit');
    Route::post('request-withdrawal/update/{requestWithdrawal}', [RequestWithdrawalController::class, 'update'])->name('request-withdrawal.update');

    Route::get('tds-data', [TdsController::class, 'index'])->name('tds.index');
    Route::post('tds-update', [TdsController::class, 'update'])->name('tds.update');
});
