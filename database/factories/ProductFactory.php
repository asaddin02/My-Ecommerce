<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $data = 'https://themewagon.github.io/famms/images/p' . rand(1,12) . '.png';
        return  [
            'name' => fake()->FirstNameMale(),
            'category_id' => fake()->numberBetween(1,3),
            'price' => fake()->numberBetween(100000,1000000),
            'desc' => fake()->paragraph($nbSentences = 3,$variableNbSentences = true),
            'image' => $data,
        ];
    }
}
