<?php

namespace Tests\Feature\Controllers;

use App\Models\Product;
use App\View\Components\main\unReactive\Products3RowsTab;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        $response->assertViewIs('main.index');
    }
}
