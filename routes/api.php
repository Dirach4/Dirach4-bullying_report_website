<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiReportController;
use App\Http\Controllers\Api\ApiAuthController;

// Register
Route::post("register", [ApiAuthController::class, "register"]);
Route::post("login", [ApiAuthController::class, "login"]);

Route::group([
    "middleware" => ["auth:sanctum"]
], function () {
    // Authenticated User Routes
    Route::get("profile", [ApiAuthController::class, "profile"]);
    Route::post("logout", [ApiAuthController::class, "logout"]);

    // Report Routes
    Route::get('/history', [ApiReportController::class, 'index'])->name('history.index');
    Route::post('/reports', [ApiReportController::class, 'store'])->name('reports.store');
    Route::get('/history/{id}', [ApiReportController::class, 'show'])->name('history.show');
    Route::put('/reports/{id}', [ApiReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{id}', [ApiReportController::class, 'destroy'])->name('reports.destroy');
});
