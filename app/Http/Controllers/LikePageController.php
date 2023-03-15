<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikePageController extends Controller
{
    protected $model = [
        'post' => Post::class,
        'product' => Product::class
    ];
    public function likePage($model)
    {
        if (in_array($model, array_keys($this->model)) && class_exists($this->model[$model]))
            return view('main.general.likes', ['instanses' => Auth::user()->userProductLikes()]);
        else
            return abort('404');
    }
}