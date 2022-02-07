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
use App\Http\Controllers\Frontend\EmployeesController;
use App\Http\Controllers\Frontend\MailsController;
use App\Http\Controllers\Frontend\SavedListController;
use App\Http\Controllers\Frontend\SettingsController;
use App\Http\Controllers\Frontend\UsersController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UploadsController;

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
    //Login & register Frontend
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::get('/auth/login',[AuthController::class, 'login'])->name('frontend_login');

    //Verification Routes
    Route::post('/email/verify', [AuthController::class, 'verify']);

    // FORGET PASSWORD
	Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
	Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');


    //Auth routes
    Route::middleware('auth:sanctum')->group( function () {

        //User profile routes
        Route::post('/users/change-password',[UsersController::class, 'change_password']);
        Route::get('/users/profile',[UsersController::class, 'getNormalUser']);
        Route::get('/users/full-profile',[UsersController::class, 'getFullUser']);
        Route::get('/users/phone',[UsersController::class, 'get_phone']);
        Route::post('/users',[UsersController::class, 'update'])->name('users.update');
        Route::resource('users',UsersController::class)->only('destroy');

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

        Route::resource('uploads', UploadsController::class );
        Route::delete('uploads', [UploadsController::class , 'destroy']);

        //Mails Routes
        Route::get('/contact-seller', [MailsController::class, 'contact_seller']);

    });

    //Index & Show of all Entities
    Route::resource('categories',CategoriesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('sub-categories',SubCategoriesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('manufactures',ManufacturesController::class ,['as' => 'frontend'])->only('index','show');

    Route::resource('machine-models', MachineModelsController::class ,['as' => 'frontend'])->only('index','show');
    Route::get('/filter_models', [ MachineModelsController::class , 'filter_models' ])->name('machine-models.filter_models');

    Route::resource('machines', MachinesController::class ,['as' => 'frontend'])->except('create', 'edit');
    Route::get('/latest-machines', [MachinesController::class, 'latest_machines`'] ,['as' => 'frontend']);
    Route::resource('news', NewsController::class ,['as' => 'frontend'])->only('index','show');
    Route::get('/latest-news', [NewsController::class, 'latest_news'] ,['as' => 'frontend']);
    Route::resource('auctions', AuctionsController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('cities', CitiesController::class ,['as' => 'frontend'])->only('index','show');
    Route::resource('settings', SettingsController::class ,['as' => 'frontend'])->only('index');
    Route::resource('employees', EmployeesController::class ,['as' => 'frontend'])->only('index');

    //Search for all Entities
    Route::get('/machines-search', [MachinesController::class, 'search_filter']);
    Route::get('/machines-filter-data', [MachinesController::class, 'getMinMaxOfField']);
    Route::get('/related-machines', [MachinesController::class, 'getRelatedMachines']);

});