<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'photo' => "required_without:picture_id|mimes:png,jpeg,jpg",
            'product_name' => "required|string|min:3|max:100",
            'name_ar' => "required|string|min:3|max:100",
            'seller_id' => "required|numeric|exists:sellers,id",
            'main_category_id' => "required|numeric|exists:main_categories,id",
            'category_id' => "required|numeric|exists:categories,id",
            'sub_category_id' => "required|numeric|exists:sub_categories,id",
            'quant'=>"required|numeric",
            'price' => "required|numeric",
            'compare_price' => "required|numeric",
            'warranty' => "nullable|string|min:3|max:100",
            'warranty_ar' => "nullable|string|min:3|max:100",
            'description' => "required|string|min:3|max:100",
            'description_ar' => "string|min:3|max:100",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'product_name.string'=>"The Product Name should be characters",
            'product_name.min'=>"The Product name should be more than 3 characters ",
            'product_name.max'=>"The Product name should be less than 100 characters ",
            'mimes'=> "please enter image file (png , jpeg or jpg)"
        ];
    }
}
