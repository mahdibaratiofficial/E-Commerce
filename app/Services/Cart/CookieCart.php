<?php
namespace App\Services\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Livewire\Commands\PublishCommand;


class CookieCart
{
    protected $cookie;

    public function __construct()
    {
        $this->cookie = $this->jsonCookieToArray();
    }
    public function add(Product $product, $quantity = 1)
    {
        // set Product information
        $cartProductinfo = [
            md5($product->id) => [
                'title' => $product->title,
                'price' => $product->price,
                'quantity' => $quantity
            ]
        ];

        if($product->quantity<1)
            return false;

        $this->setCookie($cartProductinfo);
    }
    public function update(mixed $id, $quantity)
    {
        $cookie = $this->getById($id);

        $cookie[md5($id)]['quantity'] = 2;

        $this->setCookie($cookie);
    }

    public function remove(mixed $id)
    {
        unset($this->cookie[$this->id($id)]);

        Cookie::queue('cart', json_encode($this->cookie), time() * 30, '/');
    }

    public function all()
    {
        return json_decode(Cookie::get('cart'), true);
    }

    public function getById(int|string $id)
    {
        return $this->has($id)
            ? [$this->id($id) => $this->cookie[$this->id($id)]]
            : null;

    }
    public function has(mixed $id)
    {
        return in_array($this->id($id), array_keys($this->cookie)) ? true : false;
    }

    public function jsonCookieToArray()
    {
        $cookie = Cookie::get('cart') ? Cookie::get('cart') : false;

        $cookie = $cookie ? json_decode($cookie, true) : [];

        return (count($cookie) >= 1) ? $cookie : array();
    }

    public function id(mixed $id)
    {
        if ($id instanceof Product)
            $id = $id->id;

        return (strlen($id) < 6) ? md5($id) : $id;
    }

    public function quantity($id)
    {
        return $this->getById($id)[md5($id)]['quantity'] ?? 1;
    }

    public function setCookie($cookie, $name = "cart")
    {
        $cookie = array_merge($cookie, $this->jsonCookieToArray());

        $cookie = json_encode($cookie);

        Cookie::queue($name, $cookie, time() * 2, '/');
    }
}


?>