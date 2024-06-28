<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;

use App\Http\Controllers\Api\ApiAuthController;


/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

//
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/product/create', [ProductApiController::class, 'create']);
Route::post('/product/save', [ProductApiController::class, 'save']);
Route::get('/product/{id}/edit', [ProductApiController::class, 'edit']);
Route::put('/product/{id}', [ProductApiController::class, 'update']);
Route::delete('/product/{id}', [ProductApiController::class, 'delete']);

// Register

Route::post("register", [ApiAuthController::class, "register"]);
Route::post("login", [ApiAuthController::class, "login"]);

Route::group([
    "middleware" => ["auth:sanctum"]
], function () {
    Route::get("profile", [ApiAuthController::class, "profile"]);
    Route::post("logout", [ApiAuthController::class, "logout"]);
});
