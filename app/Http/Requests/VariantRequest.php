<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
            'product_id'=>'required|numeric|exists:products,id',
            'variant_type' =>'required|in:Size,Color',
            'variant_id'=> "required|numeric",
            'variant' =>'required|string|min:3|max:50',
            'Photo' =>'nullable|mimes:png,jpg,jpeg',
            'newPrice' => "required|numeric",
            'comparePrice' => "required|numeric",
            'sku' => "required|string|min:3|max:100",
            
        ];
    }
}
