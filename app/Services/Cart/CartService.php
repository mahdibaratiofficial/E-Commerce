<?php
namespace App\Services\Cart;

class CartService
{

    protected $type;
    public function __construct($type)
    {
        $this->type=$type;
    }

    public function add()
    {
        return [
            'type'=>$this->type,
            'cart'=>'cookie'
        ];
    }
}

?>