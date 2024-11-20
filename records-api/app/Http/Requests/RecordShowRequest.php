<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordShowRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	protected function prepareForValidation(): void
	{
		// Получаем параметр маршрута 'id' и добавляем его в данные запроса для валидации
		$this->merge([
			'id' => $this->route('id'),
		]);
	}

	public function rules(): array
	{
		return [
			'id' => 'required|uuid|exists:records,id',
		];
	}

	public function messages()
	{
		return [
			'id.required' => 'Идентификатор записи обязателен.',
			'id.uuid' => 'Идентификатор записи должен быть валидным UUID.',
			'id.exists' => 'Запись с таким идентификатором не найдена.',
		];
	}
}
