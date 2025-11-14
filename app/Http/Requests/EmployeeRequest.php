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
        'phone' => 'nullable|digits:10|unique:employees,phone,' . $employeeId,
    ];
}
}
