<?php
namespace App\Models\Traits;

use App\Models\Category as ModelsCategory;

trait Category
{
    public function child()
    {
        return $this->where('id',$this->id)->get();
    }


    public function getParent()
    {
        return ($this->parent!=0) ? ModelsCategory::where('id',$this->parent)->first() : false;
    }
}
?>