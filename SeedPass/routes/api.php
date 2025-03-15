<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\SeedLotController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CertificationBodyController;
use App\Http\Controllers\CertificationBodyController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('producteurs', ProductorController::class);
Route::post('/producteur/login', [ProductorController::class, 'login']);

Route::apiResource('agriculteurs', FamerController::class);
Route::apiResource('distributeurs', DistributorController::class);
Route::apiResource('lot-de-semence',SeedLotController::class);

Route::prefix('ressource')->group(function () {
    Route::apiResource('organisme-de-certification', CertificationBodyController::class);
    Route::post('login',[CertificationBodyController::class,'login']);
});



