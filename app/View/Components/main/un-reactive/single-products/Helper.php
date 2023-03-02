<?php
namespace App\View\Components\main\unReactive;
use App\Models\Product;
trait Helper
{
    public $product;
    public function __construct($product)
    {
        $this->product=$product;
    }
    public function safeLoad(Product $product,$methodName)
    {
        if($product->$methodName())
            return $product->attribute;
        else
            return null;
    }
}










?>