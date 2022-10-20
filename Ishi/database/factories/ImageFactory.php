<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Outdoor' => 'Outdoor/download.jpg',
            'Living Room' => 'Living_Room/modern-living-room-decor-1366x768.webp',
            'Bedroom' => 'Bedroom/images.jpg',
            'Kitchen' => 'Kitchen/download.jpg',
            'Bathroom' => 'Bathroom/download (1).jpg',
            'Other' => 'Other/download.jpg'
        ];
    }
}
