<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Content;

class ModerationLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content_id' => Content::factory()->create(),
            'action' => $this->faker->randomElement(['rejected', 'approved']),
            'moderator_note' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
