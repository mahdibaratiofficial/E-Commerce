<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;

    protected function model()
    {
        return new Category();
    }


    public function testRelationWithProduct()
    {
        $category=Category::factory()->has(Product::factory()->count(3))->create();

        $this->assertTrue(is_array($category->Products->toArray()) && count($category->Products->toArray())==3);
    }
}
