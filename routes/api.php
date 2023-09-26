<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [UserController::class, 'login']); //working
Route::post('/register', [UserController::class, 'register']); //working
Route::get('/books', [BookController::class, 'getBooks']); //working
Route::get('/books/{id}', [BookController::class, 'showBooks']); //working



Route::post('/detail', [DetailsController::class, 'store']);
Route::get('/bookdetail/{id}', [DetailsController::class, 'show']);



Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['can:admin access']], function () {
        Route::get('/users', [UserController::class, 'getUsers']); //working
        Route::post('/book', [BookController::class, 'addBooks']); //working
        Route::delete('/book/{id}', [BookController::class, 'deleteBooks']); //working
        Route::put('/book/{id}', [BookController::class, 'updateBooks']); //working
    });

    Route::post('/additems/{id}', [CartController::class, 'addToCart']);
    Route::post('/logout', [UserController::class, 'logout']); //working 

});