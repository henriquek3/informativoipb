<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserForm extends FormRequest
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
            'cpf' => 'required|min:11|max:20|string|unique:users',
            'email' => 'required|min:11|max:100|string|unique:users',
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
