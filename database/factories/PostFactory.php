<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => $this->faker->text(10),
            'body' => $this->faker->text(100),
            // 'user_id' => User::factory()->create()->id,
            // 'user_id' => User::where('id', rand(1, 5))->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
