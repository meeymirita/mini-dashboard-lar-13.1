<?php

namespace App\Http\Requests\Review;

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
            'tasks' => ['required', 'array', 'min:1'],

            'tasks.*.title' => ['required', 'string', 'max:255'],
            'tasks.*.description' => ['required', 'string', 'max:255'],
            'tasks.*.time' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'tasks.*.title.required' => 'Введите заголовок.',
            'tasks.*.description.required' => 'Введите описание.',
            'tasks.*.time.required' => 'Укажите время.',
            'tasks.*.time.date_format' => 'Время должно быть в формате HH:MM.',
        ];
    }
}
