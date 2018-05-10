<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uniqueRule = Rule::unique('features')->where(function ($query) {
            $query->where('belongs_to', request()->belongs_to);
        });

        if ($this->method() === 'PATCH') {
            $uniqueRule->ignore($this->feature->id);
        }

        return [
            'name' => [ 'required', $uniqueRule ],

            'category' => 'required',
            'belongs_to' => 'required',
        ];
    }
}
