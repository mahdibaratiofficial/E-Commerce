<?php

namespace Tests\Feature\Models;

use App\Models\attributeValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttributeValueTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function model()
    {
        return new attributeValue();
    }
}
