<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\RecentlyView\Facade\RecentlyView;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function getPost(Post $post)
    {
        RecentlyView::add($post);

        dd($post);
        return view('main.product.product-fullpage', compact('product'));
    }
}