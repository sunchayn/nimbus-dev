<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WebhookController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::put('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'destroy']);
    Route::post('/{product}/images', [ProductController::class, 'uploadImages']);
    Route::get('/{product}/reviews', [ProductController::class, 'reviews']);
    Route::post('/{product}/reviews', [ProductController::class, 'addReview']);
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{order}', [OrderController::class, 'show']);
    Route::put('/{order}', [OrderController::class, 'update']);
    Route::patch('/{order}/status', [OrderController::class, 'updateStatus']);
    Route::delete('/{order}', [OrderController::class, 'cancel']);
    Route::post('/{order}/items', [OrderController::class, 'addItems']);
    Route::delete('/{order}/items/{item}', [OrderController::class, 'removeItem']);
});
