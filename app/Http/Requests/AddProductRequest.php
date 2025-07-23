<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === "admin";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                'unique:products,name',
                'regex:/^[\pL\s]+$/u'
            ],
            'description' => [
                'required',
                'string',
                'max:2000',
                'regex:/^[\pL\s\.,\-]+$/u'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0.01',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'stock' => [
                'required',
                'integer',
                'min:0'
            ],
            'category' => [
                'required',
                'integer',
                'min:0'
            ],
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:2048'
            ]
        ];
    }

        /**
         * Get the error messages for the defined validation rules.
         *
         * @return array<string, string>
         */
        public function messages(): array
        {
            return [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name may only contain letters and spaces.',
                'description.required' => 'The description field is required.',
                'description.regex' => 'The description may only contain letters, spaces, points, commas, and dashes.',
                'price.required' => 'The price field is required.',
                'price.regex' => 'The price must be a valid number with up to two decimal places.',
                'stock.required' => 'The stock field is required.',
                'image.required' => 'An image is required for the product.',
                'category.required' => 'the category field is required'
            ];
        }
}
