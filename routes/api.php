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
use App\Http\Controllers\CartsController;
use App\Http\Controllers\UsersController;
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


    Route::resource('categories',CategoriesController::class)->except('create','edit','index','show');
    Route::resource('sub-categories',SubCategoriesController::class)->except('create','edit','index','show');
    Route::resource('manufactures',ManufacturesController::class)->except('create','edit','index','show');
    Route::resource('machine-models', MachineModelsController::class)->except('create','edit','index','show');
    Route::resource('machines', MachinesController::class)->except('create','edit','index','show');
    Route::resource('news', NewsController::class)->except('create','edit','index','show');
    Route::resource('auctions', AuctionsController::class)->except('create','edit','index','show');

    Route::get('/cart', [CartsController::class,'getCart'])->name('cart');
    Route::post('/cart/add', [CartsController::class,'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{$id}', [CartsController::class,'removeItem'])->name('cart.remove');
    Route::post('/cart/clear', [CartsController::class,'clearCart'])->name('cart.clear');
});

//Index & Show of all Entities
Route::resource('categories',CategoriesController::class)->only('index','show');
Route::resource('sub-categories',SubCategoriesController::class)->only('index','show');
Route::resource('manufactures',ManufacturesController::class)->only('index','show');
Route::resource('machine-models', MachineModelsController::class)->only('index','show');
Route::resource('machines', MachinesController::class)->only('index','show');
Route::resource('news', NewsController::class)->only('index','show');
Route::resource('auctions', AuctionsController::class)->only('index','show');

//Search for all Entities
// Route::get('/categories-search', [CategoriesController::class, 'search']);
// Route::get('/sub-categories-search', [SubCategoriesController::class, 'search']);
// Route::get('/manufactures-search', [ManufacturesController::class, 'search']);
// Route::get('/machine-models-search', [MachineModelsController::class, 'search']);
Route::get('/machines-search', [MachinesController::class, 'search']);
Route::get('/machines-filter-data', [MachinesController::class, 'getMinMaxOfField']);
