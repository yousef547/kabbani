<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product_QuantityRequest extends FormRequest
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
            'quant'=>'required|numeric|min:0|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'You should enter quantity',
            'max'=>'The quantity should be less than 3 characters',
            'numeric'=>'The quantity should be numbers',
            'not_in:0'=>'The quantity should be greater than 0',
            'min:0'=>'The quantity should be greater than 0',
        ];
    }
}
