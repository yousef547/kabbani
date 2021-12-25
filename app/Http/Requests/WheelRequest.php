<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WheelRequest extends FormRequest
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
            'value' => "required|string|min:3|max:100",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>'This field should be string',
            'value.min'=>"The value should be more than 3 characters ",
            'value.max'=>"The value should be less than 100 characters ",
        ];
    }
}
