<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriesRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'category' => 'required|string|regex:/^[\pL\s]+$/u|min:3'
        ];
    }
      public function messages()
    {
        return [
            'category.required' => 'The category field is required.',
            'category.min' => 'The category must be at least 10 characters.',
            'category.regex' => 'The category must be a string or space only'
        ];
    }
    
     
}
