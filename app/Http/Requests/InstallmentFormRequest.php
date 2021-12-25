<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallmentFormRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:150',
            'phone'=>'required|string|min:3|max:15',
            'email'=>'required|mail|min:3|max:150',
            'address'=>'required|string|min:3|max:300',
            'installment_type'=>'required|string|min:3|max:200',
        ];
    }
}
