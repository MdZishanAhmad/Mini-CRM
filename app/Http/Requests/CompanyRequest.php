<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'required|nullable|unique:companies,logo',
            'website' => 'nullable|url|max:255',
        ];
        if ($this->isMethod('post')) {
            $rules['logo'] = 'nullable|image|dimensions:min_width=100,min_height=100';
        } else {
            $rules['logo'] = 'nullable|image|dimensions:min_width=100,min_height=100';
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
        ];
    }
}
