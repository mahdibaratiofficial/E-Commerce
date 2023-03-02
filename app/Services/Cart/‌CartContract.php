<?php
namespace App\Services\Cart;

interface CartContract
{
    public function add():void;

    public function update();

    public function remove();

    public function all();

    public function getById();
}







?>