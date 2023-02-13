<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertPostData()
    {
        $post = Post::factory()->create()->toArray();

        $this->assertDatabaseHas('posts', $post);
    }


    public function testPostRelationWithUser()
    {
        $post=Post::factory()
            ->for(User::factory())
            ->create();

        $this->assertTrue(isset($post->user->id));

        $this->assertTrue($post->user instanceof User);
        
    }
}
