<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email'=> $this->faker->safeEmail(),
            'subject' => $this->faker->realText($maxNbChars = 25),
            'body' => $this->faker->realText($maxNbChars = 1000)
        ];
    }
}
