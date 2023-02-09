<?php
namespace App\Models\Traits;
use App\Models\ActiveCode as ModelsActiveCode;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

trait ActiveCode
{

    private function isUserAuthenticated()
    {
        if (Auth::hasUser())
        {
            return [
                'user_id'=>Auth::id(),
                'ip_address'=>request()->getClientIp()
            ];
        }
        else
        {
            return [
                'ip_address'=> request()->getClientIp()
            ];
        }
    }
    public function scopeGenerateCode($query)
    {
        $activeCode = [
            'code' => $this->freshCode(),
            'expire_at' => now()->addMinutes(5),
        ];

        $activeCode=array_merge($activeCode, $this->isUserAuthenticated());

        $createdCode=\App\Models\ActiveCode::create($activeCode);

        if (isset($createdCode->code))
        {
            \App\Models\ActiveCode::deleteExpiredCodes();;
            return $createdCode->code;
        }
        else
        {
            return false;
        }

    }

    private function checkCodeNotExists(int $code):bool
    {
        $ActiveCode=ModelsActiveCode::where('code', $code)->first();

        if (!isset($ActiveCode->code))
            return true;
        else
            return false;
    }

    private function freshCode()
    {

        $code=rand(100000, 999999);

        if($this->checkCodeNotExists($code))
            return $code;
        else
            $this->createAFreshCode();
    }


    public function scopeVerifyCode($query,$code)
    {
        // the freshest code
        $freshestCode = \App\Models\ActiveCode::max('expire_at');

        //select the code
        $activeCode = \App\Models\ActiveCode::where('code', $code)->where('expire_at',$freshestCode)->first();

        if (!$activeCode)
            return 'not exists';

        if ($activeCode->ip_address != request()->getClientIp())
            return 'diffrent device';
        
        if(Auth::hasUser())
            if(!$activeCode->user()->get())
                return 'diffrent user';

        if ($activeCode->expire_at < now())
            return 'code expire';

        // delete used Code
        // $activeCode->delete();

          
        return true;
    } 

    public function scopeDeleteExpiredCodes()
    {
        $codes = \App\Models\ActiveCode::where('expire_at', '<', now())->delete();
    }

    public function scopeDeleteUserOtpCodes()
    {
        \App\Models\ActiveCode::user()->delete();
    }
}



?>