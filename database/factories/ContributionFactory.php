<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Item;
use App\Models\Proprietary;

class ContributionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'item_id' => Item::pluck('id')->random(),
            'proprietary_id' => Proprietary::pluck('id')->random(),
            'content' => $this->faker->paragraph,
            'validation' => $this->faker->boolean,
        ];
    }
}
