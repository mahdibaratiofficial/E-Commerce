<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertUserData()
    {
        $user=User::factory()->make()->toArray();

        $user['password'] = Hash::make('123456789');

        $userCreated=User::create($user);

        $this->assertTrue(isset($userCreated->id));
    }

    public function testRelationWithVendors()
    {
        $user=User::factory()->has(Vendor::factory()->count(3))->create();

        $this->assertTrue(is_array($user->Vendors->toArray()));

        $this->assertTrue($user->vendors[0] instanceof Vendor);

        $this->assertTrue(count($user->vendors->toArray())==3);
    }
}
