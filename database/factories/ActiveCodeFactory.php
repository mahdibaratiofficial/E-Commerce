<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActiveCode>
 */
class ActiveCodeFactory extends Factory
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
            'ip_address'=>$this->faker->ipv4(),
            'code'=>rand(100000,999999),
            'expire_at'=>now()->addMinutes(5)
        ];
    }
}
