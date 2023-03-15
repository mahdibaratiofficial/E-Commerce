<?php
namespace App\Services\RecentlyView\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

use function PHPUnit\Framework\returnSelf;

trait setRecentlyProccessingTrait
{
    /**
     * Add a entity that the user has seen 
     *
     * @param mixed $object model or model id
     * @return void|bool
     */
    public function add(object|int $object = null)
    {
        $instance = $this->checking($object);

        if (!$instance)
            return false;
        else
            $instance = $this->createEntityFromModel($instance);

        $this->setCookie($instance);
    }

    private function checking(object|int $object = null)
    {
        if (!is_null($object) && $object instanceof Model)
            $instance = $object;
        else
            return false;

        return $instance;
    }

    private function createEntityFromModel($model)
    {
        if (!$model instanceof Model)
            return false;

        $entity[get_class($model)] = $model->id;

        return $entity;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getCookies()
    {
        if (Cookie::has('recentlyView'))
            return json_decode(Cookie::get('recentlyView'), true);
    }

    /**
     * Undocumented function
     *
     * @param [type] $instance
     * @return void
     */
    public function setCookie($instance)
    {
        $entity = $this->getCookies();

        $instanceName = array_key_first($instance);

        if(!in_array($instance[$instanceName],$entity[$instanceName] ?? []))
            $entity[$instanceName][] = $instance[$instanceName];

        Cookie::queue('recentlyView', json_encode($entity), time() * 2628288);
    }

}

?>