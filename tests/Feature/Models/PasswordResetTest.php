<?php

namespace Tests\Feature\Models;

use App\Models\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;

    protected function model()
    {
        return new PasswordReset();
    }
}
