<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     *
     * @return array
     */
    public function run()
    {
        return [
            ProductAndDependsSeeder::class
        ];
    }
}
