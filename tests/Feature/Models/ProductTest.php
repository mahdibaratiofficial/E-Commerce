<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertData()
    {
        $product=Product::factory()->create()->toArray();

        $this->assertDatabaseHas('products',$product);
    }


    public function testRelationWithVendors()
    {
        $product=Product::factory()->for(Vendor::factory())->create();

        $this->assertTrue(isset($product->vendor->id));

        $this->assertTrue($product->vendor instanceof Vendor);
    
    }


    public function testRelationWithCategory()
    {
        $product=Product::factory()->for(Category::factory()->count(3))->create();

        $this->assertTrue(is_array($product->Categories()->toArray()) && count($product->Categories()->toArray()) ==3 );
    }
}
+