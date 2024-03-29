<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->jobTitle(),
            'description'=>$this->faker->paragraph(),
            'rate'=>rand(0,5),
            'quantity'=>rand(1,200),
            'price'=>rand(1000,20000),
            'slug'=>$this->faker->slug,
            'vendor_id'=>1,
            'views'=>rand(100,1000000)
        ];
    }
}
