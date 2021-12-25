<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoCategoriesRequest extends FormRequest
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
            'title' => "required|string|min:3|max:100",
            'title_ar' => "required|string|min:3|max:100",
            'bannerLink' => "required|string|min:3|max:100",
            'photo' => "required_without:picture_id|mimes:png,jpeg,jpg",
            'products'=>"array"
        ];
    }
}
