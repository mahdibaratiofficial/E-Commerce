<?php

namespace Database\Factories;

use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PasswordReset>
 */
class PasswordResetFactory extends Factory
{
    protected $model = PasswordReset::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email'=>$this->faker->email(),
            'token'=>Str::random(15),
            'expire_at'=>now()->addHours(1)
        ];
    }
}