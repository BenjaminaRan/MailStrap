<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CrudControllers;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('v1/crud')->middleware('auth.api')->group(function () {
    Route::get('/contact', [CrudControllers::class, 'get']);
    Route::post('/contact', [CrudControllers::class, 'create']);
    Route::get('/contact/{id}', [CrudControllers::class, 'getById']);
    Route::put('/contact/{id}', [CrudControllers::class, 'update']);
    Route::delete('/contact/{id}', [CrudControllers::class, 'delete']);
});


Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::post('password/reset', [ResetPasswordController::class, 'reset']);
