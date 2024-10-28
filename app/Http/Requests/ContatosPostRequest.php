<?php

namespace App\Http\Requests;

use App\Rules\Cep;
use App\Rules\Cpf;
use App\Rules\Email;
use App\Rules\Telefone;
use Illuminate\Foundation\Http\FormRequest;

class ContatosPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => ['required', new Cpf],
            'nome' => ['required'],
            'email' => ['required', new Email],
            'telefone' => ['required', new Telefone],
            'cep' => ['required', new Cep],
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ];
    }

    public function messages(){
        return [
            'cpf.required' => 'O campo CPF é obrigatório',
            'nome.required' => 'O campo Nome é obrigatório',
            'email.required' => 'O campo E-mail é obrigatório',
            'telefone.required' => 'O campo Telefone é obrigatório',
            'cep.required' => 'O campo CEP é obrigatório',
            'logradouro.required' => 'O campo Endereço é obrigatório',
            'numero.required' => 'O campo Número é obrigatório',
            'bairro.required' => 'O campo Bairro é obrigatório',
            'cidade.required' => 'O campo Cidade é obrigatório',
            'uf.required' => 'O campo Estado é obrigatório',
            'latitude.required' => 'O campo Latitude é obrigatório',
            'longitude.required' => 'O campo Longitude é obrigatório',
        ];
    }
}
