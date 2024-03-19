<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'unit' => 'Unit',
            'stock' => rand(1, 9999),
            'location_id' => Location::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
