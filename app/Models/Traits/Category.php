<?php
namespace App\Models\Traits;

trait Category
{
    public function child()
    {
        return $this->where('id',$this->id)->get();
    }
}
?>