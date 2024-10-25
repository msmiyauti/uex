<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            "cep" => "01001-000",
            "logradouro"=> "Praça da Sé",
            "complemento"=> "lado ímpar",
            "unidade"=> "",
            "bairro"=> "Sé",
            "localidade"=> "São Paulo",
            "uf"=> "SP",
            "estado"=> "São Paulo",
            "regiao"=> "Sudeste",
            "ibge"=> "3550308",
            "gia"=> "1004",
            "ddd"=> "11",
            "siafi"=> "7107"
        ];
    }
}
