<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\LoginController;

Route::post('login', [LoginController::class, 'store']);

Route::middleware('')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('recipes', RecipeController::class);
    Route::apiResource('tags', TagController::class);
});
