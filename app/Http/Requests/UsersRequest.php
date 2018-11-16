<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'  =>  'required|max:100|min:3',
            'email' =>  'required|email|unique:users',
            'password'   =>  'required|min:3',
            'admin' =>  'required'
        ];
    }

    /**
     * Personalizar erros
     */
    public function messages()
    {
        return [
            'admin.required'        =>  'Selecione um cargo para o usuário',
            'email.unique'    =>  'Este endereço de email já está sendo usado por outro usuário'
        ];
    }
}
