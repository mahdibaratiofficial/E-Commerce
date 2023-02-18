<?php

namespace Tests\Feature\Models;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase,ModelHelperTesting;

    protected function model()
    {
        return new Post();
    }


    public function testPostRelationWithUser()
    {
        $post=Post::factory()
            ->for(User::factory())
            ->create();

        $this->assertTrue(isset($post->user->id));

        $this->assertTrue($post->user instanceof User);
        
    }


    public function testRelationWithImages()
    {
        $product=Post::factory()->has(Image::factory()->count(5))->create();

        $this->assertTrue(isset($product->images[0]->id));

        $this->assertTrue(count($product->images->toArray())==5);

        $this->assertTrue($product->images[0] instanceof Image);
    }
}
