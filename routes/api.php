<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/books', [BookController::class,'index']);
    Route::get('/books/{isbn}', [BookController::class,'index']);
    Route::get('/books/{title}', [BookController::class,'index']);
    Route::get('/books/{is_aviable}', [BookController::class,'index']);
});