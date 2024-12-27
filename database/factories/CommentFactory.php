<?php

namespace Database\Factories;

define('ANON_CHANCE', 80); // % chance for an anonymous comment

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = null;
        if (rand(0, 100) < ANON_CHANCE) {
            $user = [
                'id' => null,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
            ];
        } else {
            $userCount = User::all()->count();
            $user = User::where('id', rand(1, $userCount))->first();
        }
        $articleId = rand(1, Article::all()->count());
        return [
            'ip' => fake()->localIpv4(),
            'user_id' => $user['id'],
            'article_id' => $articleId,
            'email' => $user['email'],
            'name' => $user['name'],
            'content' => fake()->paragraphs(rand(1, 3), true),
            'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
