<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
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
            'name' => "required|string",
            'country' => "required|string",
            'description_1' => "required|string",
            'description_2' => "required|string",
            'description_3' => "required|string",
            'description_4' => "required|string",
            'position' => "required|string",
            'email' => "required|string",
            'contact_person' => "required|string",
            'projects_done' => "required|integer",
            'experience' => "required|integer",
            'satisfaction' => "required|integer",
            'avatar' => 'nullable|mimetypes:image/jpeg,image/png,image/webp',
            
        ];
    }
}
