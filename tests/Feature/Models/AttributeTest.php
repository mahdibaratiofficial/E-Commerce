<?php

namespace Tests\Feature\Models;

use App\Models\Attribute;
use App\Models\attributeValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttributeTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function model()
    {
        return new Attribute();
    }


    public function testRelationWithValues()
    {
        $attr=Attribute::factory()->has(attributeValue::factory())->create();

        $this->assertTrue(isset($attr->attributeValue));

        $this->assertTrue($attr->attributeValue[0] instanceof attributeValue);

    }
}
