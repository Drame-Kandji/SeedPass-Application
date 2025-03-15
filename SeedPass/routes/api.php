<?php
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\FamerController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\SeedLotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificationBodyController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin/')->group(function () {
    Route::get('index', [UserAuthController::class, 'index']);
    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login',[UserAuthController::class,'login']);
    Route::post('logout',[UserAuthController::class,'logout']);
});


Route::apiResource('productors', ProductorController::class);
Route::apiResource('famers', FamerController::class);
Route::apiResource('distributors', DistributorController::class);
Route::apiResource('lot-de-semence',SeedLotController::class);

Route::prefix('ressource')->group(function () {
    Route::apiResource('organisme-de-certification', CertificationBodyController::class);
    Route::post('organisme-de-certification/login',[CertificationBodyController::class,'login']);
});



