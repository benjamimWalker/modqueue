<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->word(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
