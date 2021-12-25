<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Customer_LocationsRequest extends FormRequest
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
            'email'=>"required|email|max:100",
            'address' => "string|max:100",
            'latitude' => "numeric",
            'longitude' => "numeric",
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is request',
            'email'=>'This field should be an email',
        ];
    }
}
