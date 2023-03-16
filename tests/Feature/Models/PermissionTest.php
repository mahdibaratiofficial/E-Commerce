<?php

namespace Tests\Feature\Models;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use ModelHelperTesting;

    public function model()
    {
        return new Permission();
    }
}
