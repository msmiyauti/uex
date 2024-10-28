<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    
    public function index(Request $request, $cep){

        // $cep = "01001000"; 
        $response = Http::get("https://viacep.com.br/ws/$cep/json/");

        return $response;
    }
}
