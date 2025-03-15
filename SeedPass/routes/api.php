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

    // Liste des lots de semences (accessible à tous)
    Route::get('lot-de-semence', [SeedLotController::class, 'index'])
        ->middleware('auth:productor');

    // Création d'un lot de semences (réservé aux admins)
    Route::post('lot-de-semence', [SeedLotController::class, 'store'])
        ->middleware(['auth:productor']);

    // Afficher un lot spécifique (accessible aux utilisateurs authentifiés)
    Route::get('lot-de-semence/{id}', [SeedLotController::class, 'show'])
        ->middleware('auth:api');

    // Mettre à jour un lot (réservé aux admins)
    Route::put('lot-de-semence/{id}', [SeedLotController::class, 'update'])
        ->middleware(['auth:api', 'role:admin']);

    // Supprimer un lot (réservé aux admins)
    Route::delete('lot-de-semence/{id}', [SeedLotController::class, 'destroy'])
        ->middleware(['auth:api', 'role:admin']);
});



Route::prefix('ressource')->group(function () {
    Route::apiResource('organisme-de-certification', CertificationBodyController::class);
    Route::post('organisme-de-certification/login',[CertificationBodyController::class,'login']);
});





