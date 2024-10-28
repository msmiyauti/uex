<?php

namespace App\Rules;

use App\Models\Contatos;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Email implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**
         * Verificar se já tem cadastro
         */
        if(Contatos::where("email", $value)->first()){
            $fail("O E-mail já cadastrado.");
        }
    }
}
