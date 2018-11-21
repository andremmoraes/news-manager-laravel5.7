<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $email = (\Auth::user()->email == 'admin@admin.com' ? 'required|email|unique:users' : '');
        $password = (\Request::input('password') != "" ? 'required|min:3' : '');

        return [
            'name'      => 'required|max:100|min:3',
            'email'     => $email,
            'password'  => $password,
        ];
    }
}
