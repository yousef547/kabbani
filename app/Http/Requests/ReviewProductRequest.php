<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewProductRequest extends FormRequest
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
            'user_id'=>"required|numeric|exists:customers,id",
            'product_id'=>"required|numeric|exists:products,id",
            'review_num'=>"required|numeric|between:1,5]",
            'review_comment'=>"required|min:3|max:1000",
        ];
    }
}
