<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Mail\Http\Controllers\MailController;
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


//Routes for frontend
Route::group(['prefix' => '/','middleware' => 'cors'], function () {

    //Auth routes
    Route::middleware('auth:sanctum')->group( function () {
        //Mails Routes
        Route::get('/contact-seller', [MailController::class, 'contact_seller']);
    });
});
