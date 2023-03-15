<?php
namespace App\Services\RecentlyView\Facade;

use Illuminate\Support\Facades\Facade;

class RecentlyView extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'RecentlyViewService';
    }

}



?>