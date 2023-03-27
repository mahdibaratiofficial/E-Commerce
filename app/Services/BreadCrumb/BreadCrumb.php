<?php
namespace App\Services\BreadCrumb;

use Illuminate\Support\Facades\Facade;


class BreadCrumb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BreadCrumb';
    }
}






?>