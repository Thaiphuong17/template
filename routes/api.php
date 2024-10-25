<?php

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::get('/news', [ProductApiController::class, 'index']);
    Route::get('/news/csrftoken', [ProductApiController::class, 'csrftoken']);
    Route::get('/news/{new}', [ProductApiController::class, 'details']);
    Route::get('/news/category/{category}', [ProductApiController::class, 'categories']);
    //add new
    Route::post('/news', [ProductApiController::class, 'store']);
    //update new
    Route::patch('/news/{id}', [ProductApiController::class, 'update']);
    //delete new
    Route::delete('/news/{id}', [ProductApiController::class, 'destroy']);
});
// Route::get('/api/news', [ProductApiController::class, 'index'])->name('news');
// Route::get('/api/news', [ProductApiController::class, 'index'])->name('news');

