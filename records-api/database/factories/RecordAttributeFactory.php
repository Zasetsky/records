<?php

namespace Database\Factories;

use App\Models\Record;
use App\Models\RecordAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordAttributeFactory extends Factory
{
    protected $model = RecordAttribute::class;

    public function definition(): array
    {
        return [
            'record_id' => Record::factory(),
            'key' => $this->faker->word(),
            'value' => $this->faker->word(),
        ];
    }
}
