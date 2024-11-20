<?php

namespace App\DTO;

use App\Models\Record;

class RecordDTO
{
	public string $id;
	public bool $access;
	/** @var RecordAttributeDTO[] */
	public array $attributes;

	public function __construct(string $id, bool $access, array $attributes)
	{
		$this->id = $id;
		$this->access = $access;
		$this->attributes = $attributes;
	}

	/**
	 * Создание DTO из модели.
	 *
	 * @param Record $record
	 * @return self
	 */
	public static function fromModel(Record $record): self
	{
		// Преобразуем атрибуты в массив DTO
		$attributes = $record->attributes->map(
			fn($attribute) =>
			RecordAttributeDTO::fromModel($attribute)
		)->toArray();

		return new self(
			$record->id,
			$record->access,
			$attributes
		);
	}
}
