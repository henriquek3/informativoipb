<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            'cpf' => [
                'required',
                'min:11',
                'max:20',
                'string',
                Rule::unique('users')->ignore(Request::route('id'), 'id'),
            ],
            'email' => [
                'required',
                'min:11',
                'max:100',
                'string',
                Rule::unique('users')->ignore(Request::route('id'), 'id'),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cpf.unique' => 'O <strong>CPF</strong> informado já esta sendo utilizado.',
            'email.unique' => 'O <strong>email</strong> informado já esta sendo utilizado.',
        ];
    }
}
