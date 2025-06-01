<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;

Route::post('/register', [RegisterController::class, 'doRegister']);
Route::post('/login', [AuthController::class, 'login']);
// Route::prefix('user')->group(function () {
    
// });
Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/info', [UserController::class, 'getInfo']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/list', [UserController::class, 'getUsers']);
    Route::post('/createUser', [UserController::class, 'createUser']);
});

Route::group(['prefix' => 'category', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/list', [CategoryController::class, 'list']);
});