<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invitation_id' => mt_rand(1, 5),
            'name' => $this->faker->name(),
            'message' => $this->faker->sentence(),
            'confirmation' => mt_rand(0, 1)
        ];
    }
}
