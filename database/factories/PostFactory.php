<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'category'=> $this->faker->word(),
           'title'=>$this->faker->unique()->realText($maxNbChars = 50),
           'heading'=>$this->faker->realText($maxNbChars = 100),
           'body'=>$this->faker->realText($maxNbChars = 1000),
           'slug'=>$this->faker->word()
        ];
    }
}
