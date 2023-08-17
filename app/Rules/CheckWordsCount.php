<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckWordsCount implements ValidationRule
{
    protected $count;

    function __construct($count)
    {
        $this->count = $count;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void


    {
        // $text = explode(' ', $value);
        // count($text);
        if (str_word_count($value) < $this->count) {
            $fail('The bio must be more than ' . $this->count . ' words');
        }
        //
    }
}
