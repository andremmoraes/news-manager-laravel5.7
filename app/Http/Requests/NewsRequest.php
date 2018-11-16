<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'  =>  'required|min:3',
            'description' =>  'required|min:12'
        ];
    }

    /**
     * Personalizar erros
     */
    public function messages()
    {
        return [
            'title.required'        =>  'Por favor, digite um título',
            'description.min'    =>  'Por favor, o conteúdo deve ter pelo menos 12 caracteres'
        ];
    }
}
