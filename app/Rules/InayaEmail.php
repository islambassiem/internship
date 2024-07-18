<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\ValidationRule;

class InayaEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Str::after($value, '@') !== 'inaya.edu.sa') {
            $fail(__('The email should be inaya email'));
        }
    }
}
