<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'product_id'=>'required_without:id|numeric',
            'seller_id' => 'required_without:id|numeric',
            'photo' => "required_without:id|mimes:png,jpeg,jpg",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The field should be characters",
        ];
    }
}
