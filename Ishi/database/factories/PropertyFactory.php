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
            'propertyName' => 'blah',
            'propertyLocation' => fake()->city(),
            'Address' => fake()->address(),
            'Description' => fake()->paragraph(3),
            'Status' => 'rent',
            'Image' => 'pexels-josh-fields-3964406.jpg',
            'OwnerId'=> fake()->randomNumber(),
        ];
    }
}
