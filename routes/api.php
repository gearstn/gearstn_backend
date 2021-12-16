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

        //Logout User
        Route::post('/auth/logout',[AuthController::class, 'logout']);

        //Verification Routes
        Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend',[VerificationController::class, 'resend'])->name('verification.resend');

    });
});
