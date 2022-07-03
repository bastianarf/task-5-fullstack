<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::resource('category', CategoryController::class)->except([
            'create', 'edit'
        ]);

        Route::resource('article', ArticleController::class)->except([
            'create', 'edit'
        ]);
    });
});


