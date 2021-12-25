<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_id' => "required|numeric",
            'order_number' => "required|numeric",
            'currency' => "required|string|min:2|max:3",
            'order_status_url' => "required|string|max:100",
            'token' => "required|string|max:64",
            'total_discounts' => "required|numeric|max:4",
            'total_price' => "required|numeric|max:4",
            'contact_email'=>"required|email|max:100",
            'vendor' => "required|string|max:100",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'numeric'=>"This field should be numbers",
            'email'=>"This field should be email",            
        ];
    }

}
