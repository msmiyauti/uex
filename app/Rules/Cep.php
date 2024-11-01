<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cep implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**
         * Validar o formato 99999-99
         */
        if(!preg_match('/^\d{5}\-\d{3}$/', $value)){
            $fail("O campo $attribute não é válido.");
        }
    }
}
