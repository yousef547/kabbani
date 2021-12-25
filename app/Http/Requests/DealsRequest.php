<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealsRequest extends FormRequest
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
            'dealName'=>'required|string|min:3|max:100',
            'dealName_ar'=>'required|string|min:3|max:100',
            'dealType'=>'required|in:Single,Double',
            'category_id'=>"required|numeric|exists:categories,id",
            'product_id'=>"required|numeric|exists:products,id",
            'photo1'=>'required_without:picture_id|mimes:png,jpg,jpeg',
            'photo2'=>'nullable|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The name should be characters",
            'min'=>"The name should be more than 3 characters ",
            'max'=>"The name should be less than 100 characters ",
            'photo.mimes'=> "please enter image file (png , jpeg or jpg)",
        ];
    }
}
