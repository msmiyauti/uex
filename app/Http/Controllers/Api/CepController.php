<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    
    /**
     * Buscar endereço por cep 
     */
    public function index($cep){

        $response = Http::get("https://viacep.com.br/ws/$cep/json/");

        return $response;
    }
}
