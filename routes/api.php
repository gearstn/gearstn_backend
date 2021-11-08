<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\MachineModelsController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\ManufacturesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/auth/login',[AuthController::class, 'login'])->name('login');

// FORGET PASSWORD
Route::post('/auth/forgot-password',[AuthController::class, 'forgotPassword'])->name('forgot-password');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/change-password',[AuthController::class, 'change_password']);
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
    Route::post('/auth/logout',[AuthController::class, 'logout']);

    //Verification Routes
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend',[VerificationController::class, 'resend'])->name('verification.resend');


    Route::resource('machines', MachinesController::class)->except('search');
    Route::resource('categories',CategoriesController::class)->except('create','edit');
    Route::resource('sub-categories',SubCategoriesController::class)->except('create','edit');
    Route::resource('manufactures',ManufacturesController::class)->except('create','edit');
    Route::resource('machine-models', MachineModelsController::class)->except('create','edit');
    Route::resource('news', NewsController::class)->except('create','edit');
    Route::resource('auctions', AuctionsController::class)->except('create','edit');
});


Route::get('/categories/search/{query}', [CategoriesController::class, 'search']);
Route::get('/machines/search/{term}', [MachinesController::class, 'search']);
// Route::get('/categories/{equipmenttype}',[CategoriesController::class, 'index']);
Route::get('/manufactures/{category}',[ManufacturesController::class, 'index']);
Route::get('/models/{subcategory}/{manufacture}',[MachineModelsController::class,'index']);
