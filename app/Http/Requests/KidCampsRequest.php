<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KidCampsRequest extends FormRequest
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
        $uniqueRule = Rule::unique('kid_camps', 'name');

        if ($this->method() === 'PATCH') {
            $uniqueRule = Rule::unique('kid_camps', 'name')->ignore($this->kid_camp->id);
        }

        return [
            'name' => [ 'required', $uniqueRule ],
            'location' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название - обязательное поле.',
            'name.unique'   => 'Это название уже занято.',
            'location.required' => 'Расположение - обязательное поле.',
        ];
    }
}
