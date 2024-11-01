<?php

namespace App\Rules;

use App\Models\Contatos;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cpf implements ValidationRule
{
    
    protected mixed $id;

    /**
     * @param mixed $id
     * 
     */
    public function __construct(mixed $id)
    {
        $this->id = $id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**
         * Valida o formato 999.999.999-99
         */
        if(!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $value)){
            $fail("O campo $attribute não é CPF válido.");
        }
        
        /**
         * Validar se é válido pelo calculo
         */
        if(! $this->validaCPF($value)){
            $fail("O CPF não é válido.");
        }
        
        /**
         * Verificar se já tem cadastro
         */
        if(Contatos::where("cpf", $value)->whereNot('id', $this->id)->first()){
            $fail("O CPF já cadastrado.");
        }
    }

    /**
     * @var $cpf
     * @return boolean
     */
    function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
