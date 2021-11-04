<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineModelController;
use App\Http\Controllers\MachineCategoryController;
use App\Http\Controllers\MachineManufactureController;
use App\Models\User;
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
Route::post('/auth/login', [AuthController::class, 'login']);
// FORGET PASSWORD
Route::post('/auth/forgot-password', [AuthController::class , 'forgotPassword'])->name('forgot-password');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/auth/change-password', [AuthController::class ,'change_password']);
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/machine/post', [MachineController::class, 'store']);
    Route::post('/machine_category/post', [MachineCategoryController::class, 'store']);
    Route::post('/machine_manufacture/post', [MachineManufactureController::class, 'store']);
    Route::post('/machine_model/post', [MachineModelController::class, 'store']);
});



$router->resource('machines', MachineController::class);

$router->get('/machines/search/{term}', [MachineController::class, 'search']);
$router->get('/machine_category/{equipmenttype}', [MachineCategoryController::class, 'index']);
$router->get('/machine_manufacture/{category}', [MachineManufactureController::class, 'index']);
$router->get('/machine_model/{subcategory}/{manufacture}', [MachineModelController::class, 'index']);