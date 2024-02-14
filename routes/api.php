<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('company')->name('company.')->group(function (){
    Route::get('/getAll', [CompanyController::class,'getAll']);
    Route::get('/getOne/{id}', [CompanyController::class,'getOne']);
    Route::post('/createOne', [CompanyController::class,'createOne']);
    Route::put('/updateOne/{id}', [CompanyController::class,'updateOne']);
    Route::delete('/deleteOne/{id}', [CompanyController::class,'deleteOne']);
});


Route::prefix('brand')->name('brand.')->group(function (){
    Route::get('/getAll', [BrandController::class,'getAll']);
    Route::get('/getOne/{id}', [BrandController::class,'getOne']);
    Route::post('/createOne', [BrandController::class,'createOne']);
    Route::put('/updateOne/{id}', [BrandController::class,'updateOne']);
    Route::delete('/deleteOne/{id}', [BrandController::class,'deleteOne']);
});


Route::prefix('product')->name('product.')->group(function (){
    Route::get('/getAll', [ProductController::class,'getAll']);
    Route::get('/getOne/{id}', [ProductController::class,'getOne']);
    Route::post('/createOne', [ProductController::class,'createOne']);
    Route::put('/updateOne/{id}', [ProductController::class,'updateOne']);
    Route::delete('/deleteOne/{id}', [ProductController::class,'deleteOne']);
});

