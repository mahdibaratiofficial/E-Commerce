<?php

namespace App\View\Components\main\unReactive;

use App\Models\Category;
use Illuminate\View\Component;

class NavMenu extends Component
{

    public $categories=null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getAllCategories();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main.un-reactive.nav-menu');
    }

    public function getAllCategories()
    {
        if($cate=Category::select('title')->take(10)->get())
            $this->categories= $cate;
    }
}
