<?php
namespace App\Services\BreadCrumb;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Route;

use function PHPUnit\Framework\returnSelf;

class BreadCrumbService
{

    protected $instance;
    public function Categories()
    {
        if ($this->instance)
            return $this->getCategories();
    }

    public function set($instance = null)
    {
        if (is_null($instance))
            $instance = Route::current()->getPrefix();
        else
            $this->instance = $instance;

        if (is_string($instance))
            $this->instance = $this->createInstance($instance);

        return $this;
    }

    private function createInstance($instance)
    {
        $segment = request()->segments();

        $segment = end($segment);

        $instance = str_replace('/', '', $instance);

        $className = "App\Models\{$instance}";

        $class = (class_exists($className)) ? new $className() : false;

        if ($class)
            return $class->where('slug', $segment)->first();
        else
            return false;
    }

    private function getCategories()
    {
        $categories = ($this->instance->Categories) ? $this->instance->Categories : false;

        $category=$categories[0];

        if ($categories) {
            while ($category->getParent()) {
                $category=$category->getParent();

                $categories[]=$category;
            }
        }

        return $categories ?? false;
    }
}


?>