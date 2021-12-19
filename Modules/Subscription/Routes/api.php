<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Subscription\Http\Controllers\SubscriptionController;

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
            Route::resource('subscriptions','SubscriptionController' ,['as' => 'frontend'])->only('index','show');
            Route::post('subscriptions/add', [SubscriptionController::class , 'subscribe' ] ,['as' => 'frontend']);
        });
});
