<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ttg;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ttg>
 */
class ttgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

//    protected $model = ttg::class;
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name(),
            'players'=> $this->faker->randomDigit(),
            'description'=> $this->faker->text()
        ];
    }
}
