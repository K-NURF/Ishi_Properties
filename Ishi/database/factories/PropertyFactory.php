<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->numberBetween(5000, 21474836);
        return [
            'name' => $this->faker->sentence(),
            'user_id' => fake()->numberBetween(1, 7),
            'address' => fake()->address(),
            'location' => fake()->city(),
            'type' => 'mansion',
            'purpose' => 'Rent',
            'price' => number_format($price, 2, '.', ','),
            'description' => $this->faker->paragraph(5),
            'website' => $this->faker->url(),
            'image' => fake()->numberBetween(1, 5),
        ];
    }
}
