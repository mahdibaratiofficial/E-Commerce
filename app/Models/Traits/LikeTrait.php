<?php
namespace App\Models\Traits;

use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Livewire\Commands\PublishCommand;
use PhpParser\Node\Expr\New_;

use function PHPUnit\Framework\returnSelf;

trait LikeTrait
{
    public function like()
    {
        if (Auth::user()) {
            
            $like = new \App\Models\Like(['user_id' => Auth::id()]);

            try {
                $this->likes()->save($like);
            }
            catch (\Exception $e) {
                // 23000 is code of ununique 
                if ($e->getCode() == 23000)
                    return 'equal';
            }
        }
    }

    public function unlike()
    {
        if ($this->likes()->where('user_id', 1)->get())
            return $this->likes()->where('user_id', 1)->delete();
        else
            return null;
    }

    public function isLiked($user = null)
    {
        $like = $this->likes()->where('user_id', (!$user) ?? Auth::id())->first();

        return $like ? true : false;
    }

    public function allLikes()
    {
        return count($this->likes);
    }


}


?>