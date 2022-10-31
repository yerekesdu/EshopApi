<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::post('/register', [AuthApiController::class, 'register']);

//Route::resource('goods', GoodController::class);
//Route::resource('carts', CartController::class);
Route::post('/{id}', 'CartController@decrease');
Route::post('/carts/{id}', [CartController::class, 'decrease'])->name('carts.decrease');

//Route::resource('goods', GoodApiController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
