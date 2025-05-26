<?php

namespace Database\Factories;

use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            return [
                'name' => $this->faker->word,
                'slug' => $this->faker->slug,
                'description' => $this->faker->sentence,
                'location' => $this->faker->city,
                'scheduled_at' => now()->addDays(rand(1, 30)),
        ];
    }
}
