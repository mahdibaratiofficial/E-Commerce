<?php

namespace Tests\Feature\Models;

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertVendorData()
    {
        $vendor=Vendor::factory()->create()->toArray();

        $this->assertDatabaseHas('vendors',$vendor);
    }
}
