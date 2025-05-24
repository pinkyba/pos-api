<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequest
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
            'email' => ['required','email'],
            'password'  => ['required', 'between:6,36'],
        ];
    }
    /**
     * Gets the error message for a defined validation rule.
     */
    public function messages(): array
    {
        return [
            'email.required' => __('register.no_email'),
            'password.required' => __('register.no_password'),
        ];
    }
}
