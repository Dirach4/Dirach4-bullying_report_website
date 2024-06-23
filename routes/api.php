<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\Auth\ApiAuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\ApiConfirmablePasswordController;
use App\Http\Controllers\Api\Auth\ApiEmailVerificationNotificationController;
use App\Http\Controllers\Api\Auth\ApiEmailVerificationPromptController;
use App\Http\Controllers\Api\Auth\ApiNewPasswordController;
use App\Http\Controllers\Api\Auth\ApiPasswordController;
use App\Http\Controllers\Api\Auth\ApiPasswordResetLinkController;
use App\Http\Controllers\Api\Auth\ApiRegisteredUserController;
use App\Http\Controllers\Api\Auth\ApiVerifyEmailController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiAuthenticatedSessionController::class, 'store']);
Route::post('/logout', [ApiAuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->post('/confirm-password', [ApiConfirmablePasswordController::class, 'store']);
Route::middleware('auth:sanctum')->post('/email/verification-notification', [ApiEmailVerificationNotificationController::class, 'store']);
Route::middleware('auth:sanctum')->get('/email/verify', ApiEmailVerificationPromptController::class);
Route::post('/reset-password', [ApiNewPasswordController::class, 'store']);
Route::middleware('auth:sanctum')->put('/user/password', [ApiPasswordController::class, 'update']);
Route::post('/forgot-password', [ApiPasswordResetLinkController::class, 'store']);
Route::post('/register', [ApiRegisteredUserController::class, 'store']);
Route::middleware(['auth:sanctum', 'signed'])->get('/email/verify/{id}/{hash}', ApiVerifyEmailController::class)->name('verification.verify');


//
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/product/create', [ProductApiController::class, 'create']);
Route::post('/product/save', [ProductApiController::class, 'save']);
Route::get('/product/{id}/edit', [ProductApiController::class, 'edit']);
Route::put('/product/{id}', [ProductApiController::class, 'update']);
Route::delete('/product/{id}', [ProductApiController::class, 'delete']);

