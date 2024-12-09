<?php

namespace Database\Factories;

use App\Models\Employers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employers_id'=>Employers::factory(),
            'title'=>fake()->jobTitle(),
            'description'=>fake()->paragraph(),
            'location'=> fake()->city(),
            'schedule'=> "Full Time",
            'url'=>fake()->url(),
            'featured'=> false,
        ];
    }
}
