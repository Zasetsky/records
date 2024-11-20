<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\RecordDTO;
use App\Models\Record;

class RecordService
{
	/**
	 * Поиск записей по массиву фильтров key-value.
	 *
	 * @param array $filters
	 * @return RecordDTO[]
	 */
	public function searchRecords(array $filters): array
	{
		$query = Record::query();

		$query->whereHas('attributes', function ($q) use ($filters) {
			$q->where(function ($subQuery) use ($filters) {
				foreach ($filters as $filter) {
					$subQuery->orWhere(function ($nestedQuery) use ($filter) {
						$nestedQuery->where('key', $filter['key'])
							->where('value', $filter['value']);
					});
				}
			});
		});



		$records = $query->with('attributes')->get();

		return $records->map(fn($record) => RecordDTO::fromModel($record))->toArray();
	}


	/**
	 * Получение записи по ID.
	 *
	 * @param string $id
	 * @return RecordDTO
	 *
	 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
	 */
	public function getRecordById(string $id): RecordDTO
	{
		$record = Record::with('attributes')->findOrFail($id);

		return RecordDTO::fromModel($record);
	}
}
