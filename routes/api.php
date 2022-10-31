<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\GoodApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\GoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

Route::get('/goods/byslug', [GoodApiController::class, 'getBySlug']);
Route::resource('goods', GoodApiController::class);
Route::resource('categories', CategoryApiController::class);
Route::resource('carts', CartApiController::class);
Route::get('/carts', [CartApiController::class, 'index'])->name('carts.index');
Route::post('/carts/add', [CartApiController::class, 'add']);
Route::post('/carts/subtract', [CartApiController::class, 'subtract']);

Route::get('/orders', [OrderApiController::class, 'index']);
Route::post('/order/store', [OrderApiController::class, 'store']);

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

