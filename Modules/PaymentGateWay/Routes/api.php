<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PaymentGateWay\Http\Controllers\PayPalController;

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

Route::group(['prefix' => '/','middleware' => 'cors'], function () {
    //Auth routes
    Route::middleware('auth:sanctum')->group( function () {
        Route::get('payment',[PayPalController::class , 'payment' ])->name('payment');
        Route::get('cancel', [PayPalController::class , 'cancel' ])->name('payment.cancel');
        Route::get('payment/success',[PayPalController::class , 'success' ])->name('payment.success');    });
});