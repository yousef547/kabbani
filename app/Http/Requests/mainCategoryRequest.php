<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mainCategoryRequest extends FormRequest
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
            'photo'=>"required_without:picture_id|mimes:png,jpg,jpeg",
            'name'=>"required|string|min:3|max:100",
            'name_ar'=>"required|string|min:3|max:100",
            // 'category.*.active'=>"required",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'name.string'=>"The name should be characters",
            'name.min'=>"The name should be more than 3 characters ",
            'name.max'=>"The name should be less than 100 characters ",
            'photo.mimes'=> "please enter image file (png , jpeg or jpg)",
        ];
    }

}
