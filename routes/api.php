<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/auth')->group(function(){
  Route::post('/login',[AuthController::class,'login']);
  Route::post('/register',[AuthController::class,'register']);
  Route::post('/logout',[AuthController::class,'logout']);
  Route::apiResource('/user',UserController::class)->middleware('Islogin');
});

Route::prefix('store')->group(function(){

 Route::get('/books/{id}',[BookController::class,'show']);
 Route::get('/books',[BookController::class,'index']);

 Route::post('/books',[BookController::class,'store'])->middleware('Islogin');
 Route::put('/books/{id}',[BookController::class,'update'])->middleware('Islogin');
 Route::delete('/books/{id}',[BookController::class,'destroy'])->middleware('Islogin');

 Route::apiResource('/roles',RoleController::class)->middleware('Islogin');
 Route::apiResource('/orders',OrderController::class)->middleware('Islogin');

 Route::post('/books/{id}/reviews',[ReviewController::class,'store'])->middleware('Islogin');

 Route::get('/books/all/reviews',[ReviewController::class,'index']); 
 Route::get('/books/{id}/review',[ReviewController::class,'show'])->where('id','[0-9]+');

});
