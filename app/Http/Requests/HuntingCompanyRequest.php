<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HuntingCompanyRequest extends FormRequest
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
        $uniqueRule = Rule::unique('hunting_companies', 'name');

        if ($this->method() === 'PATCH') {
            $uniqueRule->ignore($this->hunting_company->id);
        }

        return [
            'name' => [ 'required', $uniqueRule ],
            'hunting_place_id' => [ 'required', Rule::exists('hunting_places', 'id') ],
            'hunting_region_id' => [ 'required', Rule::exists('hunting_places', 'id') ],
        ];

        // TODO: at least one hunting type should be true
    }

    public function messages()
    {
        return [
            'name.required' => 'Название - обязательное поле!',
            'name.unique' => 'Это название уже занято',

            'hunting_place_id.required' => 'Место - обязательное поле',

            'hunting_region_id.required' => 'Регион - обязательное поле',
        ];
    }
}
