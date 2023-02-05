<?php

namespace Tests\Feature\Models;

use App\Models\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreatePasswordReset()
    {
       $data=PasswordReset::factory()->make()->toArray();

        PasswordReset::create($data);

        $this->assertDatabaseHas('password_resets',$data);
    }
}
