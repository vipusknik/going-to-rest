<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidModelClass implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return class_exists($value);
     }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not a valid class path';
    }
}
