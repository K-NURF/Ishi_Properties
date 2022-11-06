<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'role' => 'owner',
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->numerify('############'),
            'email_verified_at' => now(),
            'password' => '$2y$10$IPKUUeBFE3ZZxiHymaSyDu9HoI4iCMoIIglH/MO9jmdt5pS0TzU/O', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
