<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\SeedLotController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CertificationBodyController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('ressource')->group(function () {
    Route::apiResource('producteurs', ProductorController::class);
    Route::post('/producteur/login', [ProductorController::class, 'login']);
});


Route::prefix('ressource')->group(function () {
    Route::apiResource('agriculteurs', FamerController::class);
    Route::post('agriculteur/login',[FamerController::class,'login']);
});


Route::prefix('ressource')->group(function () {
    Route::apiResource('distributeurs', DistributorController::class);
    Route::post('distributeur/login',[DistributorController::class,'login']);
});


Route::prefix('ressource')->group(function () {
    Route::apiResource('lot-de-semence',SeedLotController::class);
});


Route::prefix('ressource')->group(function () {
    Route::apiResource('organisme-de-certification', CertificationBodyController::class);
    Route::post('organisme-de-certification/login',[CertificationBodyController::class,'login']);
});





