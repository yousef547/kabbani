<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:100',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is request',
            'email'=>'This field should be an email',
            'max'=>"The field should be less than 100 characters ",
        ];
    }
}
