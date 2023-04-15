<?php
namespace App\Services\BreadCrumb;

use Illuminate\Routing\Route;

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
            $instance = request()->route()->getPrefix();
        else
            $this->instance = $instance;

        if (is_string($this->instance))
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
        $categories = (count($this->instance->Categories) > 1) ? $this->instance->Categories : false;

        if (!$categories)
            return [];

        $category = $categories[0];

        if ($categories) {
            while ($category->getParent()) {
                $category = $category->getParent();

                $categories[] = $category;
            }
        }

        return $categories ?? false;
    }
}


?>