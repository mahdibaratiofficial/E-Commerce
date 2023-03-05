<?php
use App\Services\Cart\CookieCart;

return [
    'cart'=>[
        'cookie'=>CookieCart::class,
        'database'=>DataBaseCart::class
    ]
];





?>