<?php

namespace Tests\Feature\Models;

use App\Models\User;
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
    
    
    public function testRelationWithUser()
    {
        $vendor=Vendor::factory()->has(User::factory()->count(3))->create();

        $this->assertTrue(is_array($vendor->users->toArray()));

        $this->assertTrue($vendor->users[0] instanceof User);

        $this->assertTrue(count($vendor->users->toArray())==3);
    }
}
