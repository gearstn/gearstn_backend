<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\ServiceController;

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
Route::group(['middleware' => 'cors'], function () {

    //Auth routes
    Route::middleware('auth:sanctum')->group( function () {
        //Store Update Destroy routes for Machines and Models
        Route::resource('services', 'ServiceController' ,['as' => 'frontend'])->only('store','update','destroy');
        Route::get('/user-services', [ServiceController::class, 'user_services']);
    });

    Route::resource('services', 'ServiceController' ,['as' => 'frontend'])->except('create', 'edit');
    //Search for all Entities
    Route::get('/services-search', [ServiceController::class, 'search_filter']);
});
