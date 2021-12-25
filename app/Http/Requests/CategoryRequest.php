<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'photo'=>"required_without:picture_id|mimes:png,jpeg,jpg",
            'category_name'=>"required|string|min:3|max:100",
            'category_name_ar'=>"required|string|min:3|max:100",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The name should be characters",
            'min'=>"The name should be more than 3 characters ",
            'max'=>"The name should be less than 100 characters ",
            'mimes'=> "This file should be picture (png or jpeg or jpg)"
        ];
    }
}
