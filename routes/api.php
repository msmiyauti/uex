<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CepController;
use App\Http\Controllers\Api\ContatosController;
use App\Http\Resources\CepResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return response()->json(["success"=>true]);
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/auth', [AuthController::class, "generateToken"]);

// // Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/token', [TokenController::class, "get"])->middleware(['auth', 'verified']);
    Route::get('/cep/{cep}', [CepController::class, "index"])->middleware('auth:sanctum')->name('api.cep');
    Route::get('/contatos', [ContatosController::class, "index"])->middleware('auth:sanctum')->name('api.contatos');
    Route::get('/contatos/dashboard', [ContatosController::class, "dashboard"])->middleware('auth:sanctum')->name('api.contatos.dashboard');
// });