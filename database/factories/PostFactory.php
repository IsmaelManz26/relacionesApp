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
    public function definition(): array
    {
        return [
            'entrada'=> substr($this->faker->text, 0, 60),
            'texto'=> $this->faker->text,
            'titulo'=> substr($this->faker->text, 0, 40),
        ];
    }
}
