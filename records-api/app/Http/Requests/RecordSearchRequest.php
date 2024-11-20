<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordSearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filters' => 'required|array|min:1',
            'filters.*.key' => 'required|string|max:255',
            'filters.*.value' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'filters.required' => 'Необходимо предоставить фильтры для поиска.',
            'filters.array' => 'Фильтры должны быть массивом.',
            'filters.*.key.required' => 'Каждый фильтр должен содержать ключ.',
            'filters.*.value.required' => 'Каждому фильтру должно соответствовать значение.',
        ];
    }
}

