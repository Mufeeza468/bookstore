<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
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
Route::post('/login', [UserController::class, 'loginUsers']); //working
Route::post('/register', [UserController::class, 'registerUsers']); //working

//Book API
Route::get('/book', [BookController::class, 'getBooks']); //working
Route::get('/book/{id}', [BookController::class, 'showBooks']); //working

//Book Detail API
Route::get('/bookdetail/{id}', [DetailsController::class, 'showDetails']); //working


Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['can:admin access']], function () {
        //User API
        Route::get('/users', [UserController::class, 'getUsers']); //working
        Route::get('/users/{id}', [UserController::class, 'showUsers']); //working
        Route::delete('/users/{id}', [UserController::class, 'deleteUsers']); //working

        //Book API
        Route::post('/addbook', [BookController::class, 'addBooks']); //working
        Route::delete('/book/{id}', [BookController::class, 'deleteBooks']); //working
        Route::put('/book/{id}', [BookController::class, 'updateBooks']); //working

        //Review API
        Route::delete('/review/{id}', [ReviewController::class, 'deleteReviews']); //working

        //Order API
        Route::get('/order', [OrderController::class, 'getOrders']); //working
    });


    //User API
    Route::put('/user', [UserController::class, 'updateUsers']); //working
    Route::post('/subscribe', [UserController::class, 'subscribeUsers']); //working
    Route::post('/logout', [UserController::class, 'logoutUser']); //working 

    //Book Details API
    Route::post('/detail/{id}', [DetailsController::class, 'addDetails']); //working

    //Review API
    Route::post('/review/{id}', [ReviewController::class, 'addReviews']); //working
    Route::get('/review', [ReviewController::class, 'showReviews']); //working
    Route::put('/review/{id}', [ReviewController::class, 'updateReviews']);

    //Order API
    Route::post('/confirm', [OrderController::class, 'confirmOrders']); //working
    Route::get('/userorder', [OrderController::class, 'userOrders']);

    //Wishlist API
    Route::post('/wishlist/{bookId}', [WishlistController::class, 'addToList']); //working
    Route::delete('/wishlist/{bookId}', [WishlistController::class, 'deleteInList']); //working
    Route::get('/wishlist', [WishlistController::class, 'getList']); //working

});