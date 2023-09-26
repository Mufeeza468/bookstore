<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ReviewController;
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

//User API
Route::post('/login', [UserController::class, 'login']); //working
Route::post('/register', [UserController::class, 'register']); //working

//Book API
Route::get('/books', [BookController::class, 'getBooks']); //working
Route::get('/books/{id}', [BookController::class, 'showBooks']); //working

//Book Details API


Route::get('/bookdetail/{id}', [DetailsController::class, 'show']); //working



Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['can:admin access']], function () {
        //User API
        Route::get('/users', [UserController::class, 'getUsers']); //working
        Route::get('/users/{id}', [UserController::class, 'showUsers']); //working
        Route::delete('/users/{id}', [UserController::class, 'deleteUsers']); //working

        //Book API
        Route::post('/book', [BookController::class, 'addBooks']); //working
        Route::delete('/book/{id}', [BookController::class, 'deleteBooks']); //working
        Route::put('/book/{id}', [BookController::class, 'updateBooks']); //working
    });
    Route::post('/detail/{id}', [DetailsController::class, 'store']); //working
    Route::post('/review/{id}', [ReviewController::class, 'addReview']);
    Route::post('/additems/{id}', [OrderController::class, 'addToCart']);
    Route::post('/logout', [UserController::class, 'logout']); //working 

});