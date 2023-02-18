<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\ProfilePicture;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model()
    {
        return new User();
    }

    public function testRelationWithVendors()
    {
        $user = User::factory()->has(Vendor::factory()->count(3))->create();

        $this->assertTrue(is_array($user->Vendors->toArray()));

        $this->assertTrue($user->vendors[0] instanceof Vendor);

        $this->assertTrue(count($user->vendors->toArray()) == 3);
    }

    public function testRelationWithProfile()
    {
        $user=User::factory()->has(ProfilePicture::factory())->create();

        $this->assertTrue(isset($user->profilePicture->id));

        $this->assertTrue($user->profilePicture instanceof ProfilePicture);

        $this->assertDatabaseHas('profile_pictures',$user->profilePicture->toArray());
    }
}