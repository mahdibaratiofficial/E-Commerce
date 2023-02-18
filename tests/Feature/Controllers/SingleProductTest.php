<?php

namespace Tests\Feature\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSingleProductPage()
    {
        $product=Product::factory()->create();
        $response = $this->get(route('product',$product));

        $response->assertOk();
        $response->assertViewIs('main.product.product-fullpage');

        $response->assertViewHas('product',$product);

        $this->assertTrue($product instanceof Product);
    }
}
