<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
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
            'product_id'=>"required|numeric|exists:products,id",
            'email'=>"required|email|max:100",
            'rate'=>"required|numeric|between:1,5",
            'message'=>"required|string|min:4|max:100",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The field should be characters",
            'email'=>"Please Enter valid email",
            'numeric'=>"PLease Enter number between 1 to 5",
        ];
    }
}
