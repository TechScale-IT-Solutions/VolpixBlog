<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, User::all()->count()),
            'title' => fake()->words(rand(18,32), true),
            'content' => fake()->paragraphs(rand(4,7), true),
            'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
