<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('recipes', RecipeController::class);
Route::apiResource('tags', TagController::class);
