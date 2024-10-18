<?php

use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('/v1')->group(function () {
    Route::get('/user/top-assigned', [UserController::class, 'topAssignedUsers']);
    Route::get('/user', [UserController::class, 'index']);

    Route::get('/task', [TaskController::class, 'index']);
    Route::post('/task', [TaskController::class, 'store']);
});
