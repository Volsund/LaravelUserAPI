<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->get('/me', [UserController::class, 'getAuthData']);

Route::middleware('auth:sanctum')->put('/me', [UserController::class, 'updateNumber']);
