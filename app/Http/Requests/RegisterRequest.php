<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|string|max:100',
            'phone' => "nullable|numeric|digits:11|regex:/^01[0,1,2,5]{1}[0-9]{8}/",
            'address' => "required|string|max:100",
            'latitude' => "required|numeric",
            'longitude' => "required|numeric",
            'fcm_token'=>'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is request',
            'email'=>'This field should be an email',
            'max'=>"The field should be less than 100 characters ",
            'phone.digits'=>"The phone number must be 11 numbers",
            'phone.regex'=>"PLease enter valid phone number",
        ];
    }
}
