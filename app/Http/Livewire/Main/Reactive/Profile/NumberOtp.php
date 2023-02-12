<?php

namespace App\Http\Livewire\Main\Reactive\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ActiveCode;
use Illuminate\Validation\Rule;

class NumberOtp extends Component
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
            if(Auth::user()->number==$this->number && Auth::user()->number_verified_at!=null)
                return true;

            $code = ActiveCode::generateCode();
            $this->inputStatus = 'code';
        }
        elseif($this->inputStatus=='code')
        {
           $verifyStatus=ActiveCode::verifyCode($this->code);

            if ($verifyStatus)
                $this->Active();
        }
    }

    public function validation()
    {
        if($this->inputStatus=='number')
        {
            $this->validate(
                ['number' =>
                    ['required',
                    'regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/',
                    'min:11',
                    'max:11',
                    Rule::unique('users','number')->ignore(Auth::id())]],
                    [
                        'number.required'=>'وارد کردن شماره الزامی است',
                        'number.regex'=>'لطفا شماره را به درستی وارد کنید!',
                        'number.min'=>'ارقام از حد مجاز کوتاه تر است',
                        'number.max'=>'ارقام زیاد است',
                        'number.unique'=>'این شماره قبلا ثبت شده'
                    ]
                );
        }   
        elseif($this->inputStatus=='code')
        {
            $this->validate(['code' => ['required', 'min:6', 'max:6']]);
        }
    }


    public function Active()
    {
        $user=Auth::user();

        $user->update([
            'number'=>$this->number
        ]);

        $user->forceFill(
            [
                'number_verified_at'=>now()
            ]
        )->save();
    }
}
