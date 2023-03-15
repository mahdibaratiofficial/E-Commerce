<?php
namespace App\Services\RecentlyView\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

trait getRecentlyProccessingTrait
{
    public function all(mixed $object)
    {
        $object = new $object();

        if (!$object instanceof Model)
            return false;

        $cookies = $this->getCookie()[get_class($object)] ?? [];

        if (!$cookies)
            return null;

        $whereCondition = '';

        foreach ($cookies as $key => $obj) {
            if ($key == 0)
                $whereCondition .= " WHERE id = $obj ";
            else
                $whereCondition .= " OR id=$obj ";
        }

        $table = $object->getTable();

        $recentlyViewed = DB::select("SELECT * FROM $table {$whereCondition}");

        return $recentlyViewed;
    }

    public function getCookie()
    {
        if (Cookie::has('recentlyView'))
            return json_decode(Cookie::get('recentlyView'), true);
    }
}



?>