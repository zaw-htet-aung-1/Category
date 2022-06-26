<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            // 'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
            // 'body.required' => 'အကြောင်းအရာထည့်ပါ။',
            // 'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        ];
    }

    public function attributes()
    {
        return [
            'body' => 'Content'
        ];
    }
}
