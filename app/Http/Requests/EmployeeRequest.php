<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $employeeId = $this->route('employee')?->id ?? $this->employee?->id;

        return [
            'first_name' => 'required|string|max:255|min:2|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|string|max:255|min:2|regex:/^[a-zA-Z\s]+$/',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|max:255|unique:employees,email,' . $employeeId,
            'phone' => 'nullable|string|max:20|regex:/^[\+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{1,9}$/|unique:employees,phone,' . $employeeId,
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.regex' => 'The first name may only contain letters and spaces.',
            'last_name.regex' => 'The last name may only contain letters and spaces.',
            'phone.regex' => 'The phone number format is invalid.',
            'phone.max' => 'Phone number cannot exceed 20 characters.',

        ];
    }
}
