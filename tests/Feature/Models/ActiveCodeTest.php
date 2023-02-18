<?php

namespace Tests\Feature\Models;

use App\Models\ActiveCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActiveCodeTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;


    protected function model()
    {
        return new ActiveCode();
    }

    public function testInsertToDataBase()
    {
        $model = $this->model();
        $table = $model->getTable();

        $insert = $model::factory()->create()->toArray();

        $this->assertDatabaseCount($table, 1);

        $this->assertTrue(isset($insert['code']));
    }
}