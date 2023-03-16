<?php

namespace Tests\Feature\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use ModelHelperTesting,RefreshDatabase;

    public function model()
    {
        return new Like();
    }

    public function testRelationWithUser()
    {
        $like=Like::factory()->for(User::factory()->count(1))->create();

        dd($like->users);

        $this->assertTrue($like->isLiked($like->user()));
    }
}
