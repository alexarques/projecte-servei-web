<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class,'details']);
    Route::resource('products', 'Api\ProductController');
});

Route::post('user/login', [AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);
/*
Route::get('products', [ProductController::class,'index']);
Route::post('products',[ProductController::class,'store']);
Route::put('products/{product}',[ProductController::class,'update']);
Route::delete('products/{product}',[ProductController::class,'destroy']);

Route::get('providers', [ProviderController::class,'index']);
Route::post('providers',[ProviderController::class,'store']);
Route::put('providers/{provider}',[ProviderController::class,'update']);
Route::delete('providers/{provider}',[ProviderController::class,'destroy']);*/

Route::resource('products', 'Api\ProductController');