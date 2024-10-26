<?php

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


// Route::middleware('auth')->group(function () {
    Route::get('/cep/{cep}', [CepController::class, "index"]);
    Route::get('/contatos', [ContatosController::class, "index"])->name('api.contatos');
// });