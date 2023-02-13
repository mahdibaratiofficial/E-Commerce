<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertComment()
    {
        $comment=Comment::factory()->create()->toArray();

        $this->assertDatabaseHas('comments',$comment);
    }
}
