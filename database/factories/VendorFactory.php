<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vendor_name'=>$this->faker->company(),
            'rate'=>rand(1,5),
            'presentation'=>$this->faker->paragraph(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->companyEmail(),
            'socials'=>$this->faker->text()
        ];
    }
}
