<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name' => 'required | max:255',
            'name' => [ 'required', 'max:255' ],
            // 'email' => 'required|max:255|unique:users,email,' . auth()->id(),
            'email' => 'required|max:255|' . Rule::unique('users', 'email')->ignore(auth()->id()),
        ];
    }
}
