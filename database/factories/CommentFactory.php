<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'user_id'=>1,
            'body'=>$this->faker->paragraph(1),
            'commentable_id'=>1,
            'commentable_type'=>'App\Models\Product',
            'like'=>rand(1,100),
            'dislike'=>rand(2,40)
        ];
    }
}
