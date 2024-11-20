<?php

namespace Database\Seeders;

use App\Models\Record;
use App\Models\RecordAttribute;
use Illuminate\Database\Seeder;

class RecordsSeeder extends Seeder
{
    public function run(): void
    {
        // Проверяем, есть ли уже записи в таблице 'records'
        if (Record::exists()) {
            $this->command->info('Таблица records уже содержит данные. Сидер пропущен.');
            return;
        }

        // Создаем 10 записей
        Record::factory()
            ->count(10)
            ->create()
            ->each(function ($record) {
                // Для каждой записи добавляем от 1 до 5 атрибутов
                RecordAttribute::factory()
                    ->count(rand(1, 5))
                    ->create([
                        'record_id' => $record->id,
                    ]);
            });
    }
}


