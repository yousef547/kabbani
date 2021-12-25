<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            'name' => "required|min:3|max:100",
            'permissions' => "required|array|min:1|max:18",
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'name.min'=>"The role name should be more than 3 characters ",
            'name.max'=>"The role name should be less than 100 characters ",
        ];
    }
}
