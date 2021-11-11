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


    Route::resource('categories',CategoriesController::class)->except('create','edit','index');
    Route::resource('sub-categories',SubCategoriesController::class)->except('create','edit','index');
    Route::resource('manufactures',ManufacturesController::class)->except('create','edit','index');
    Route::resource('machine-models', MachineModelsController::class)->except('create','edit','index');
    Route::resource('machines', MachinesController::class)->except('create','edit','index');
    Route::resource('news', NewsController::class)->except('create','edit','index');
    Route::resource('auctions', AuctionsController::class)->except('create','edit','index');
});

//Index of all Entities
Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/sub-categories', [SubCategoriesController::class, 'index']);
Route::get('/manufactures', [ManufacturesController::class, 'index']);
Route::get('/machine-models', [MachineModelsController::class, 'index']);
Route::get('/machines', [MachinesController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/auctions', [AuctionsController::class, 'index']);

//Search for all Entities
Route::get('/categories-search', [CategoriesController::class, 'search']);
Route::get('/sub-categories-search', [SubCategoriesController::class, 'search']);
Route::get('/manufactures-search', [ManufacturesController::class, 'search']);
Route::get('/machine-models-search', [MachineModelsController::class, 'search']);
Route::get('/machines-search', [MachinesController::class, 'search']);
