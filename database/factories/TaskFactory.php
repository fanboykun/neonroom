<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'explanation' => $this->faker->sentence,
            'is_attachable' => $this->faker->boolean,
            'due_time' => $this->faker->dateTimeBetween('+1 days', '+3 days'),
        ];
    }
}
