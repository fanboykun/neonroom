<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'type' => rand(0, 1),
            'meet_for' => rand(1, 5),
        ];
    }
}
