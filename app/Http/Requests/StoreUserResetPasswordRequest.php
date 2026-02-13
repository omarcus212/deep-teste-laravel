<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserResetPasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo :min caracteres',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória',
            'password.confirmed' => 'As senhas não coincidem',
        ];
    }
}
