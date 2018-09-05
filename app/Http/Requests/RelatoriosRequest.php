<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatoriosRequest extends FormRequest
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
            'id_igreja' => 'required',
            'id_sinodo' => 'required',
            'id_presbiterio' => 'required',
            'id_presbitero' => 'required',
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
            'id_igreja' => 'Igreja',
            'id_sinodo' => 'Sínodo',
            'id_presbiterio' => 'Presbitério',
            'id_presbitero' => 'Presbítero',
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
            'id_igreja.required' => 'Identificação da igreja em branco, antes de inserir um relatório é necessário especificar um <strong>pastor titular</strong> ao cadastro de sua igreja.',
            'id_sinodo.required' => 'Identificação do sínodo em branco, antes de inserir um relatório é necessário especificar um <strong>pastor titular</strong> ao cadastro de sua igreja.',
            'id_presbiterio.required' => 'Identificação do presbitério em branco, antes de inserir um relatório é necessário especificar um <strong>pastor titular</strong> ao cadastro de sua igreja.',
            'id_presbitero.required' => 'Identificação do presbítero em branco, antes de inserir um relatório é necessário especificar um <strong>pastor titular</strong> ao cadastro de sua igreja.',
        ];
    }
}
