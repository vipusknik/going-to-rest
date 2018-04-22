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
        return [
            'name' => [
                'required',

                /**
                 * Feature name has to be unique but only for its model
                 */
                Rule::unique('features')->where(function ($query) {
                    $query->where('belongs_to', request()->belongs_to);
                })
            ],

            'category' => 'required',
            'belongs_to' => 'required',
        ];
    }
}
