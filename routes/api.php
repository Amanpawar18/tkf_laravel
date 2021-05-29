<?php

use App\Http\Controllers\Api\DelhiveryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('delhivery')->group(function () {
    Route::get('/orders', [DelhiveryController::class, 'index'])->name('orders');
    Route::get('/check-pin-code/{pin_code?}', [DelhiveryController::class, 'checkPinCode'])->name('checkPinCode');
    Route::get('/create-order', [DelhiveryController::class, 'createOrder'])->name('createOrder');
    Route::get('/track-order', [DelhiveryController::class, 'trackOrder'])->name('trackOrder');
    Route::get('/generate-waybill', [DelhiveryController::class, 'generateWaybill'])->name('generateWaybill');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
