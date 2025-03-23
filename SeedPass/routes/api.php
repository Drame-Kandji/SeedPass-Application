<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\SeedLotController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CertificationBodyController;
use App\Http\Controllers\VerifiableCredentialController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('ressource')->group(function () {
    Route::apiResource('producteurs', ProductorController::class);
//    Route::post('/producteur/login', [ProductorController::class, 'login']);
    Route::post('/producteur/logout', [ProductorController::class, 'logout']);
});


Route::prefix('ressource')->group(function () {
    Route::apiResource('agriculteurs/', FamerController::class);
    Route::post('agriculteur/login',[FamerController::class,'login']);
    Route::delete('agriculteur/logout',[FamerController::class,'logout']);
    Route::post('agriculteur/scan-lot-de-semence', [FamerController::class, 'scan_seedLot']);

});


Route::prefix('ressource')->group(function () {
    Route::apiResource('distributeurs', DistributorController::class);
    Route::post('distributeur/login',[DistributorController::class,'login']);
    Route::post('distributeur/logout',[DistributorController::class,'logout']);
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
    Route::post('organisme-de-certification/login',[CertificationBodyController::class,'login']);
    Route::post('organisme-de-certification/logout',[CertificationBodyController::class,'logout']);
});

// Routes API pour les credentials vérifiables
Route::prefix('vc')->group(function () {
    // Générer un credential pour un lot de semences
    Route::get('/generate/{seedId}', [VerifiableCredentialController::class, 'generateCredential']);

    // Vérifier un credential
    Route::post('/verify', [VerifiableCredentialController::class, 'verifyCredential']);
});

// Route pour le contexte JSON (accessible publiquement)
Route::get('/contexts/seed-context.json', function () {
    return response()->file(resource_path('json/seed-context.json'));
});





