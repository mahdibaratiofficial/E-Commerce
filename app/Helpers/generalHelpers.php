<?php

use App\Models\Product;
use App\Services\Cart\Cart;

if(!function_exists('safePrint'))
{
    function safePrint(null|string $value,$valueFoPrint=null)
    {
        if(!empty($value) && !is_null($value))
            return $value;
        else
            return (!is_null($valueFoPrint)) ? $valueFoPrint : "مقداری یافت نشد";
    }
}


if(!function_exists('cart'))
{
    function cart()
    {
        return Cart::class;
    }
}

?>