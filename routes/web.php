<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AuctionsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MachineModelsController;
use App\Http\Controllers\Admin\MachinesController;
use App\Http\Controllers\Admin\ManufacturesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SubCategoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin routes
Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);
});

    // Route::post('/auth/register', [AuthController::class, 'register']);
    // Route::get('/auth/login',[AuthController::class, 'login_admin'])->name('login_admin');

    //Auth for admin routes
    Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

        //Logout
        // Route::post('/auth/logout',[AuthController::class, 'logout']);

        Route::get('/',[DashboardController::class, 'index'])->name("dashboard");
        Route::resource('categories',CategoriesController::class);
        Route::resource('sub-categories',SubCategoriesController::class);
        Route::resource('manufactures',ManufacturesController::class);
        Route::resource('machine-models', MachineModelsController::class);
        Route::resource('machines', MachinesController::class);
        Route::resource('news', NewsController::class);
        Route::resource('auctions', AuctionsController::class);
        Route::resource('cities', CitiesController::class);
    });



