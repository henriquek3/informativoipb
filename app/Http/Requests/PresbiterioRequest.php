<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PresbiterioRequest extends FormRequest
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
            'sinodo' => 'required|string|min:5|max:75',
            'nome' => 'required|string|min:5|max:50',
            'sigla' => [
                'required',
                'string',
                'min:3',
                'max:10',
                Rule::unique('presbiterios')->ignore(Request::route('id'), 'id'),
            ],
            'id_sinodo' => 'required|numeric',
            'regiao' => 'required|string'
        ];
    }

    /**
     * Get the messages beautiful
     *
     * @return array $attributes
     */
    public function attributes()
    {
        return [
            'sigla' => 'Sigla',
            'id_sinodo' => 'Sínodo',
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
            'sigla.unique' => 'Já existe outro Presbitério com a <strong>sigla</strong> informada',
        ];
    }
}
