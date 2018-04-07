<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestCentersRequest extends FormRequest
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
            'name'          => [ 'required', Rule::unique('rest_centers', 'name') ],
            'reservoir_id'  => [ 'required', Rule::exists('reservoirs', 'id') ],
            'location'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название - обязательное поле',
            'name.unique'   => 'Это название уже занято',

            'reservoir_id.required'   => 'Водоем - обязательное поле',
            'reservoir_id.exists'     => 'Водоем не найден',

            'location.required' => 'Расположение - обязательное поле',
        ];
    }
}
