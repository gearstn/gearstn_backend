<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\BrandedPage\Http\Controllers\BrandedPageController;

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
    Route::middleware('auth:sanctum')->group( function () {
        Route::resource('branded-pages','BrandedPageController');
        Route::get('get-user-branded-page/{$user_id}',[BrandedPageController::class,'getUserBrandedPage']);
        Route::resource('branded-pages-posts','BrandedPagePostController');
    });
});
