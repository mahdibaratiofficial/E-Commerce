<?php

namespace Tests\Feature\Models;

use App\Models\ActiveCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActiveCodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertActiveCode()
    {
        $activeCode=ActiveCode::factory()->make()->toArray();

        $createdActiveCode=ActiveCode::create($activeCode);

        $this->assertTrue(isset($createdActiveCode->code));
    }
}
