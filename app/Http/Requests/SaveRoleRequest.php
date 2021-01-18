<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRoleRequest extends FormRequest
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
        $rules = [
            'display_name' => 'required'
        ];

        if($this->method() !== 'PUT')
        {
            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El identificador del role es obligatorio.',
            'name.unique' => 'Este identificador ya ha sido registrado.',
            'display_name.required' => 'El nombre del role es obligatorio.'
        ];
    }
}
