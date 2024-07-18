<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'district' => fake()->word(),
            'city' => fake()->city(),
            'country_id' => fake()->numberBetween(1, 5),
            'location' => fake()->ipv6(),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime()
        ];
    }
}
