<?php

namespace Tests\Feature\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;

    protected function model()
    {
        return new Comment();
    }

    public function testCommentRelationWithPosts()
    {
        $comment=Comment::factory()->count(3)->for(Post::factory(),'commentable')->create()->toArray();

        $this->assertTrue(is_array($comment) && count($comment)==3);
    }
    public function testCommentRelationWithProduct()
    {
        $comment=Comment::factory()->count(3)->for(Product::factory(),'commentable')->create()->toArray();

        $this->assertTrue(is_array($comment) && count($comment)==3);
    }
}
