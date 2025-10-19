<?php

use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Demo\VerbsController;
use Illuminate\Support\Facades\Route;

Route::prefix('inline-validation')->group(function () {
    Route::post('/simple', [DemoController::class, 'simpleValidation']);
    Route::post('/complex', [DemoController::class, 'complexValidation']);
    Route::post('/conditional', [DemoController::class, 'conditionalValidation']);
    Route::post('/enum', [DemoController::class, 'enumValidation']);
});

Route::prefix('shapes')->group(function () {
    Route::post('/nested-object', [\App\Http\Controllers\Api\OrderController::class, 'store']);

    Route::post('/array-of-primitives', [\App\Http\Controllers\Api\ProductController::class, 'store']);
});

Route::prefix('responses')->group(function () {
    Route::get('/error-responses', [DemoController::class, 'errorResponses']);

    Route::get('/success-responses', [DemoController::class, 'successResponses']);
});

Route::prefix('authentication')->group(function () {
    Route::get('/show-logged-in-user', fn (\Illuminate\Http\Request $request) => response()->json([
        'user_id' => $request->user()->id ?? '<not logged in>',
        'user_agent' => $request->userAgent(),
        'login_url' => config('app.url').'/login',
    ]));
});

Route::prefix('verbs')->group(function () {
    Route::get('/verbs', [VerbsController::class, 'get']);
    Route::post('/verbs', [VerbsController::class, 'post']);
    Route::patch('/verbs', [VerbsController::class, 'patch']);
});
