<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->firstName,
            'item_description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'price' => $this->faker->numberBetween(1 * 1000, 20 * 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => 'airdots2.jpg'
        ];
    }
}
