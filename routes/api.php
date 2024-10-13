<?php

// use App\Http\Controllers\Api\ProductApiController;
// use Illuminate\Support\Facades\Route;

// Route::controller(ProductApiController::class)->group(function () {
//     Route::get('/api/products', 'index');
// });

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::get('/products', [ProductApiController::class, 'index']);
});
