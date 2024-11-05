<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;

# Auth
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function() {
    # Logout
    Route::post('logout', [AuthController::class, 'logout']);

    # Company
    Route::apiResource('company', CompanyController::class);
});
