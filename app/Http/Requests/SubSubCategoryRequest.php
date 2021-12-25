<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSubCategoryRequest extends FormRequest
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
            'sub_sub_category_name'=>"required|string|min:3|max:100",
            'sub_sub_category_name_ar'=>"required|string|min:3|max:100",
            'sub_category_id'=>"required|numeric|exists:sub_categories,id",
            'category_id'=>"required|numeric|exists:categories,id",
            'main_category_id'=>"required|numeric|exists:main_categories,id"
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The name should be characters",
            'min'=>"The name should be more than 3 characters ",
            'max'=>"The name should be less than 100 characters ",
            'mimes'=> "This file should be picture (png or jpeg or jpg)",
            'numeric'=>"The id should be number",
        ];
    }
}
