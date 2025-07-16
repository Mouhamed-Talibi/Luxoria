<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user)
            ],
            'gender' => [
                'required',
                Rule::in(['male', 'female'])
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:50',
                'confirmed',
                'regex:/^[\w!@#$%^&*()\-_=+{};:,<.>]+$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The name may only contain letters and spaces',
            'password.regex' => 'Password may only contain letters, numbers, and symbols: !@#$%^&*()-_=+{};:,<.>',
            'gender.in' => 'Gender must be either male or female',
        ];
    }
}
