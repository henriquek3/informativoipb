<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateUserForm extends FormRequest
{
    /**
     * @var string $errorBag
     */
    protected $errorBag = 'form';

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
     *
     * @return array
     */
    public function messages()
    {
        return [
            'unique' => 'O :attribute já esta sendo utilizado.',
        ];
    }
}
