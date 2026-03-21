<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле Email обязательно для заполнения.',
            'email.email' => 'Укажите корректный формат Email.',
            'email.max' => 'Email слишком длинный.',

            'password.required' => 'Поле Пароль обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать не менее :min символов.',
        ];
    }
}
