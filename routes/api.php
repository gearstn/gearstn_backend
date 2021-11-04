<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MachineModelsController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\ManufacturesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login',[AuthController::class, 'login']);
// FORGET PASSWORD
Route::post('/auth/forgot-password',[AuthController::class, 'forgotPassword'])->name('forgot-password');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/change-password',[AuthController::class, 'change_password']);
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
    Route::post('/auth/logout',[AuthController::class, 'logout']);

    Route::resource('machines', MachinesController::class)->except('search');
    Route::resource('categories',CategoriesController::class)->except('index');
    Route::resource('manufactures',ManufacturesController::class)->except('index');
    Route::resource('machine-models', MachineModelsController::class)->except('index');
});


Route::get('/machines/search/{term}', [MachinesController::class, 'search']);
Route::get('/categories/{equipmenttype}',[CategoriesController::class, 'index']);
Route::get('/manufactures/{category}',[ManufacturesController::class, 'index']);
Route::get('/models/{subcategory}/{manufacture}',[MachineModelsController::class,'index']);
