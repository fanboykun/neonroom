<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'study' => $this->faker->company,
            'hour' => $this->faker->time,
            'semester' => $this->faker->numberBetween(1, 7),
            'description' => $this->faker->text,
        ];
    }
}
