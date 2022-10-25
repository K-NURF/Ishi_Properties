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
        return [
            'name' => $this->faker->sentence(),
            'user_id' => fake()->numberBetween(1, 12),
            'address' => fake()->address(),
            'location' => fake()->city(),
            'type' => 'mansion',
            'purpose' => 'Rent',
            'price' => fake()->numerify('#######.##'),
            'description' => $this->faker->paragraph(5),
            'website' => $this->faker->url(),
            'image' => 'download.jpg',
        ];
    }
}
