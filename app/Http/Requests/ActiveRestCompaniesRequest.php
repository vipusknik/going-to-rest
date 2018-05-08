<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActiveRestCompaniesRequest extends FormRequest
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
        $uniqueRule = Rule::unique('active_rest_companies', 'name');

        if ($this->method() === 'PATCH') {
            $uniqueRule = Rule::unique('active_rest_companies', 'name')->ignore($this->active_rest_company->id);
        }

        return [
            'name' => [ 'required', $uniqueRule ],
            'location' => 'required',
            'activities' => 'required', // there must be at least one activity,
            'activities.*' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название - обязательное поле',
            'name.unique' => 'Это название уже используется',

            'location.required' => 'Расположение - обязательное поле',

            'activities.required' => 'Должен быть добавлен хотя бы 1 вид отдыха',
            'activities.*.required' => 'Цена - обязательное поле'
        ];
    }
}
