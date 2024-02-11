<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_path = 'images/EulxFnBH3EHTqJbBaCXEYk49tOAcdpORmzfeiotB.png';
        return [
            //
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text($maxNbChars = 10000),
            'image' => $image_path,
            'likes' => $this->faker->numberBetween(100, 200),
            'user_id' => User::factory(),

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function(Post $post){

            $post->comments()->saveMany(Comment::factory()->count(5)->create([
                'user_id' => User::factory(),
                'post_id' => $post->id
            ]));
        });
    }
}
