<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'seller_id'=>'required|numeric|exists:sellers,id',
            'location'=>'required|string|min:4|max:100',
            'location_ar'=>'required|string|min:4|max:100',
            'theAddress'=>'required|string|min:4|max:100',
            'latitude'=>'required|numeric',
            'longitude'=>'required|numeric',
            'distance'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required'=>"This field is request",
            'string'=>"The Location should be characters",
            'min'=>"The field should be more than 4 characters ",
            'max'=>"The field should be less than 100 characters ",
            'numeric'=> "This file should be an number"
        ];
    }

}
