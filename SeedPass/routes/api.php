<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\SeedLotController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CertificationBodyController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('ressource')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');

});

Route::prefix('ressource')->group(function () {
    Route::apiResource('producteurs', ProductorController::class);

});


Route::prefix('ressource')->group(function () {
    Route::apiResource('agriculteurs', FamerController::class);

});


Route::prefix('ressource')->group(function () {
    Route::apiResource('distributeurs', DistributorController::class);

});


Route::prefix('ressource')->group(function () {

    // Liste des lots de semences (accessible à tous)
    Route::get('lot-de-semence', [SeedLotController::class, 'index']);
        //->middleware('auth:productor','auth:famer','auth:distributor','auth:certification_body');
    Route::get('lot-de-semence', [SeedLotController::class, 'index']);
        //->middleware('auth:productor');

    // Création d'un lot de semences (réservé aux admins)
    Route::post('lot-de-semence', [SeedLotController::class, 'store']);
        //->middleware(['auth:productor']);

    // Afficher un lot spécifique (accessible aux utilisateurs authentifiés)
    Route::get('lot-de-semence/{id}', [SeedLotController::class, 'show']);
        //->middleware('auth:productor');

    // Mettre à jour un lot (réservé aux admins)
    Route::put('lot-de-semence/{id}', [SeedLotController::class, 'update']);
        //->middleware(['auth:api', 'role:admin']);

    // Supprimer un lot (réservé aux admins)
    Route::delete('lot-de-semence/{id}', [SeedLotController::class, 'destroy']);
        //->middleware(['auth:api', 'role:admin']);
});



Route::prefix('ressource')->group(function () {
    Route::apiResource('organisme-de-certification', CertificationBodyController::class);

});





