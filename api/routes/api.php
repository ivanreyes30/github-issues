<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GithubController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');


Route::prefix('auth')->group(function () {
    Route::prefix('token')->group(function () {
        Route::post('client-credentials', [AuthController::class, 'clientCredentials']);
    });

    Route::middleware('verify-client-grant-credentials')->group(function () {
        Route::prefix('verify')->group(function () {
            Route::get('client-credentials', [AuthController::class, 'verifyClientCredentials']);
        });
    });

    // Route::post('/', [AuthController::class, 'index']);
});

Route::middleware('verify-client-grant-credentials')->group(function () {
    Route::prefix('github')->group(function () {
        Route::prefix('issue')->group(function () {
            Route::get('search', [GithubController::class, 'searchIssues']);
            Route::get('{id}', [GithubController::class, 'findIssue']);
        });
    });
});