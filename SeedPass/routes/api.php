<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\ProductorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('productors', ProductorController::class);
Route::apiResource('famers', FamerController::class);
Route::apiResource('distributors', DistributorController::class);
