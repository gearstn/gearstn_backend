<?php

use Illuminate\Support\Facades\Route;
use Modules\SparePartModel\Http\Controllers\SparePartModelController;

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
        //Store Update Destroy routes for Machines and Models
        Route::resource('spare-part-models', 'SparePartModelController' ,['as' => 'frontend'])->only('store','update','destroy');
    });
    Route::resource('spare-part-models', 'SparePartModelController' ,['as' => 'frontend'])->only('index','show');
    Route::get('/filter-spare-part-models', [ SparePartModelController::class , 'filter_spare_part_models' ])->name('spare-part-models.filter_spare_part_models');
});
