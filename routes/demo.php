<?php

use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Demo\DumpAndDieController;
use App\Http\Controllers\Demo\VerbsController;
use Illuminate\Support\Facades\Route;

Route::prefix('inline-validation')->group(function () {
    Route::post('/simple', [DemoController::class, 'simpleValidation']);
    Route::post('/complex', [DemoController::class, 'complexValidation']);
    Route::post('/conditional', [DemoController::class, 'conditionalValidation']);
    Route::post('/enum', [DemoController::class, 'enumValidation']);
    Route::post('/validator-make', [DemoController::class, 'validatorMakeValidation']);
});

Route::prefix('shapes')->group(function () {
    Route::post('/nested-object', [\App\Http\Controllers\Api\OrderController::class, 'store']);

    Route::post('/array-of-primitives', [\App\Http\Controllers\Api\ProductController::class, 'store']);
});

Route::prefix('responses')->group(function () {
    Route::get('/error-responses', [DemoController::class, 'errorResponses']);

    Route::get('/success-responses', [DemoController::class, 'successResponses']);

    Route::get('/json-resource', [\App\Http\Controllers\Demo\ResponseDemoController::class, 'jsonResource']);
    Route::get('/nested-json', [\App\Http\Controllers\Demo\ResponseDemoController::class, 'nestedJson']);
    Route::get('/spatie-data', [\App\Http\Controllers\Demo\ResponseDemoController::class, 'spatieData']);
    Route::get('/inline-json', [\App\Http\Controllers\Demo\ResponseDemoController::class, 'inlineJson']);
    Route::get('/raw-payload', [\App\Http\Controllers\Demo\ResponseDemoController::class, 'rawPayload'])->name('raw-payload');
});

Route::prefix('spatie-data')->group(function () {
    Route::get('/', [DemoController::class, 'spatieData']);
});

Route::prefix('authentication')->group(function () {
    Route::get('/show-logged-in-user', fn (\Illuminate\Http\Request $request) => response()->json([
        'user_id' => $request->user()->id ?? '<not logged in>',
        'user_agent' => $request->userAgent(),
        'login_url' => config('app.url').'/login',
    ])->withCookie('secret', 'value'));
});

Route::prefix('verbs')->group(function () {
    Route::get('/verbs', [VerbsController::class, 'get']);
    Route::post('/verbs', [VerbsController::class, 'post']);
    Route::patch('/verbs', [VerbsController::class, 'patch']);
});

Route::prefix('segments')->group(function () {
    Route::get('/{segment}', [VerbsController::class, 'get']);
    Route::post('/example2/{segment}/create', [VerbsController::class, 'post']);
});

Route::prefix('dd')->group(function () {
    Route::get('/', DumpAndDieController::class);
});

Route::prefix('request-parameters')->group(function () {
    Route::get('/', [DemoController::class, 'requestParameters']);
    Route::post('/', [DemoController::class, 'requestParameters']);
});
