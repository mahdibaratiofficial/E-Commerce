<?php

namespace Tests\Feature\Models;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use ModelHelperTesting;

    public function model()
    {
        return new Role();
    }
}