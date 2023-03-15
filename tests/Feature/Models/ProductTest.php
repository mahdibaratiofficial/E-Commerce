<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Image;
use App\Models\Like;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model()
    {
        return new Product();
    }


    public function testRelationWithVendors()
    {
        $product = Product::factory()->for(Vendor::factory())->create();

        $this->assertTrue(isset($product->vendor->id));

        $this->assertTrue($product->vendor instanceof Vendor);

    }


    public function testRelationWithCategory()
    {
        $product = Product::factory()->has(Category::factory()->count(3))->create();

        $this->assertTrue(is_array($product->Categories->toArray()));

        $this->assertTrue($product->Categories[0] instanceof Category);

        $this->assertTrue(count($product->Categories->toArray()) == 3);
    }

    public function testRelationWithImages()
    {
        $product=Product::factory()->has(Image::factory()->count(5))->create();

        $this->assertTrue(isset($product->images[0]->id));

        $this->assertTrue(count($product->images->toArray())==5);

        $this->assertTrue($product->images[0] instanceof Image);
    }

    public function testRelationWithLikes()
    {
        $product=Product::factory()->has(Like::factory()->count(1))->create();

        $this->assertTrue(isset($product->likes));
    }
}