<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("register", [AuthController::class, "register"])->middleware("throttle:api");
Route::post("login", [AuthController::class, "login"])->middleware("throttle:api");
Route::get("logout", [AuthController::class, "logout"])->middleware("throttle:api");

Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class)
->middleware(['throttle:api', 'auth:sanctum']);
Route::apiResource('posts', App\Http\Controllers\Api\PostController::class)
->middleware(['throttle:api', 'auth:sanctum']);