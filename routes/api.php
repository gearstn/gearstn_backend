<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Frontend\SubCategoriesController;
use App\Http\Controllers\Frontend\MachineModelsController;
use App\Http\Controllers\Frontend\MachinesController;
use App\Http\Controllers\Frontend\ManufacturesController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\AuctionsController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CitiesController;
use App\Http\Controllers\Frontend\SavedListController;
use App\Http\Controllers\Frontend\UsersController;

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
Route::prefix('/')->group(function () {
    //Login & register Frontend
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::get('/auth/login',[AuthController::class, 'login'])->name('frontend_login');

    // FORGET PASSWORD
    Route::post('/auth/forgot-password',[AuthController::class, 'forgotPassword'])->name('forgot-password');

    //Auth routes
    Route::group(['middleware' => ['auth:sanctum']], function () {

        //User profile routes
        Route::post('/users/change-password',[UsersController::class, 'change_password']);
        Route::get('/users/profile',[UsersController::class, 'getNormalUser']);
        Route::get('/users/full-profile',[UsersController::class, 'getFullUser']);
        Route::resource('users',UsersController::class)->only('update','destroy');

        //Logout User
        Route::post('/auth/logout',[AuthController::class, 'logout']);

        //Verification Routes
        Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend',[VerificationController::class, 'resend'])->name('verification.resend');

        //Store Update Destroy routes for Machines and Models
        Route::resource('machine-models', MachineModelsController::class ,['as' => 'frontend'])->only('store','update','destroy');
        Route::resource('machines', MachinesController::class ,['as' => 'frontend'])->only('store','update','destroy');

        Route::get('/list', [SavedListController::class,'getList'])->name('list');
        Route::post('/list/add', [SavedListController::class,'addToList'])->name('list.add');
        Route::post('/list/remove', [SavedListController::class,'removeItem'])->name('list.remove');
        Route::get('/list/clear', [SavedListController::class,'clearList'])->name('list.clear');
    });

    //Index & Show of all Entities
    Route::resource('categories',CategoriesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('sub-categories',SubCategoriesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('manufactures',ManufacturesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('machine-models', MachineModelsController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('machines', MachinesController::class ,['as' => 'frontend'])->except('create', 'edit');
    Route::resource('news', NewsController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('auctions', AuctionsController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('cities', CitiesController::class ,['as' => 'frontend'])->only('index','show');

    //Search for all Entities
    Route::get('/machines-search', [MachinesController::class, 'search_filter']);
    Route::get('/machines-filter-data', [MachinesController::class, 'getMinMaxOfField']);
    Route::get('/related-machines', [MachinesController::class, 'getRelatedMachines']);
});
