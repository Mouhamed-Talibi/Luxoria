<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'max:255',
                'exists:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8'
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'The provided credentials do not match our records.',
            'email.required' => 'Please enter your email address',
            'password.required' => 'Please enter your password'
        ];
    }
}