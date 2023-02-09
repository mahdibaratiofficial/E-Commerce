<?php

namespace App\Http\Livewire\Main\Reactive\Auth;

use App\Models\ActiveCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginWithNumber extends Component
{
    // This property determines which input between number and code will be displayed and validated
    public $inputStatus = 'number';

    public $code;

    public $number;

    // protected $rules = [
    //     'number'=>['required','min:11','max:11'],
    //     'code'=>['requred','min:6','max:6']
    // ];
    public function render()
    {
        return view('components.main.reactive.auth.login-with-number');
    }

    public function OTP()
    {
        $this->validation();

        if($this->inputStatus=='number')
        {
            $code = ActiveCode::generateCode();
            $this->inputStatus = 'code';
        }
        elseif($this->inputStatus=='code')
        {
           $verifyStatus=ActiveCode::verifyCode($this->code);

            if ($verifyStatus)
                $this->createOrLogin();
        }
    }

    public function validation()
    {
        if($this->inputStatus=='number')
        {
            $this->validate(['number' => ['required', 'min:11', 'max:11']]);
        }
        elseif($this->inputStatus=='code')
        {
            $this->validate(['code' => ['required', 'min:6', 'max:6']]);
        }
    }

    private function createOrLogin()
    {
        if($this->number)
        {
            $user=User::where('number', $this->number)->first();
            if($user)
            {
                if($user->number_verified_at==null)
                    $user->forceFill(['number_verified_at' => now()])->save();

                Auth::login($user);

                if (Auth::hasUser())
                    return redirect('/');
            }
            else
            {
                $user=User::create([
                    'number'=>$this->number,
                ]);

                $user->forceFill(
                    ['number_verified_at' => now()]
                )->save();

                Auth::login($user);

                if (Auth::hasUser())
                    return redirect('/');
            } 
        }
        else
        {
            return redirect('login');
        }
    }
}
