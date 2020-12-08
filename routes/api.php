<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;

Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/me', [PassportAuthController::class, 'getAuthData']);

Route::middleware('auth:sanctum')->put('/me', [PassportAuthController::class, 'updateNumber']);

// Route::middleware('auth:sanctum')->put('/me', function (Request $request) {
//     var_dump($request->number);
//     // var_dump($request->user());
// });
