<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('posts', App\Http\Controllers\Api\PostController::class)
->middleware(['throttle:api', 'auth:sanctum']);