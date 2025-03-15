<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\SeedLotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('productors', ProductorController::class);
Route::apiResource('famers', FamerController::class);
Route::apiResource('distributors', DistributorController::class);
Route::apiResource('lot-de-semence',SeedLotController::class);
Route::apiResource('organisme-de-certification', \App\Http\Controllers\CertificationBodyController::class);
