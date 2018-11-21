<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
        $title = (\Request::input('title') == "" ? 'required|max:100|min:3' : 'max:100|min:3');
        $description = (\Request::input('description') == "" ? 'required|min:12' : 'min:12');

        return [
            'title'  =>  $title,
            'description'   =>  $description,
        ];
    }
}
