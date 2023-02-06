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
        $activeCode = \App\Models\ActiveCode::where('code', $code)->first();

        if (!$activeCode)
            return redirect('activeCodePage')->with('code wrong');

        if($activeCode->ip_address!=request()->getClientIp())
            return redirect('activeCodePage')->with('not allowed device');
        
        if(Auth::hasUser())
            if(!$activeCode->user()->get())
                return redirect('activeCodePage')->with('diffrent user');

        if ($activeCode->expire_at < now())
            return redirect('activeCode')->with('code expire');
          
        return true;
    } 
}



?>