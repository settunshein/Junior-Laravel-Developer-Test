<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;

# Compnay
Route::apiResource('company', CompanyController::class);
