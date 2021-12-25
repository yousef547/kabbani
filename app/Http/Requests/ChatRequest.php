<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
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
            'user_type'=>'required|in:sender,receiver',
            'message'=>'required|string|min:3|max:1000',
            'chat_date' => "required|date",
            'photo'=>'nullable|mimes:png,jpeg,jpg,gif',
        ];
    }
}
