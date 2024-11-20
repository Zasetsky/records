<?php

namespace App\DTO;

use App\Models\RecordAttribute;

class RecordAttributeDTO
{
	public function __construct(
		public string $id,
		public string $record_id,
		public string $key,
		public string $value
	) {
	}

	/**
	 * Создание DTO из модели.
	 *
	 * @param RecordAttribute $attribute
	 * @return self
	 */
	public static function fromModel(RecordAttribute $attribute): self
	{
		return new self(
			id: $attribute->id,
			record_id: $attribute->record_id,
			key: $attribute->key,
			value: $attribute->value
		);
	}
}
