<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'seller_name' => "required|string|min:3|max:100",
            'seller_ar' => "required|string|min:3|max:100",
            'store_name' => "required|string|min:3|max:100",
            'store_ar' => "required|string|min:3|max:100",
            'main_category_id' => "required|numeric|exists:main_categories,id",
            'email' => "required|email|max:100|unique:sellers,email,".$this->id,
            'password' => "required_without:id|min:5|max:100",
            'phone' => "required|numeric|digits:11|regex:/^01[0,1,2,5]{1}[0-9]{8}/",
            'address' => "required|string",
            'photo' => "required_without:id|image|mimes:png,jpeg,jpg",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The field should be characters",
            'min'=>"The seller name should be more than 3 characters ",
            'max'=>"The seller name should be less than 100 characters ",
            'email'=>"Please Enter valid email",
            'phone.digits'=>"The phone number must be 11 numbers",
            'phone.regex'=>"PLease enter valid phone number",
            'photo'=>"PLease choose photo file",
            'photo.mimes'=> "please enter image file (png , jpeg or jpg)",
            'password.min'=> 'Password should be more than 5 characters',
            'password.max'=> 'Password should be less than 100 characters',
        ];
    }
}
