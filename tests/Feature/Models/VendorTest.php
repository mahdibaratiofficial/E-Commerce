<?php

namespace Tests\Feature\Models;

use App\Models\ProfilePicture;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model()
    {
        return new Vendor();
    }


    public function testRelationWithUser()
    {
        $vendor = Vendor::factory()->has(User::factory()->count(3))->create();

        $this->assertTrue(is_array($vendor->users->toArray()));

        $this->assertTrue($vendor->users[0] instanceof User);

        $this->assertTrue(count($vendor->users->toArray()) == 3);
    }

    public function testRelationWithProfilePicture()
    {
        $vendor=Vendor::factory()->has(ProfilePicture::factory())->create();

        $this->assertTrue(isset($vendor->profilePicture->id));

        $this->assertTrue($vendor->profilePicture instanceof ProfilePicture);

        $this->assertDatabaseHas('profile_pictures',$vendor->profilePicture->toArray());

    }
}