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
        return [
            'name' => [ 'required', Rule::unique('active_rest_companies', 'name') ],
            'location' => 'required',
            'activities' => 'required',// there must be at least one activity
            'activities.*' => 'required' //each activity requires cost
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
