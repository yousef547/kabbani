<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallmentRequest extends FormRequest
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
            'installment_name'=>'required|string|min:3|max:200',
            'installment_name_ar'=>'required|string|min:3|max:200',
            'installment_type'=>'required|string|min:3|max:200',
            'installment_type_ar'=>'required|string|min:3|max:200',
            'description'=>'required|string|min:3|max:300',
            'description_ar'=>'required|string|min:3|max:300',
            'photo'=>'required_without:picture_id|mimes:png,jpg,jpeg',
        ];
    }
}
