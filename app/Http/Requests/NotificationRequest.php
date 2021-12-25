<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'product_id' => "required|numeric|exists:products,id",
            'title'=>'required|string|min:3|max:150',
            'body'=>'required|string|min:3|max:1000',
            'notification_date' => "required|date",
            'photo'=>'nullable|mimes:png,jpeg,jpg,gif',
        ];
    }
}
