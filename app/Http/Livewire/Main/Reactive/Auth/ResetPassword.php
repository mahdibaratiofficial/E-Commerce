<?php

namespace App\Http\Livewire\Main\Reactive\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{

    public $old_password;

    public $password;

    public $password_confirmation;

    protected $rules=[
        'old_password'=>['required','min:6','max:255'],
        'password'=>['required','min:6','max:255'],
        'password_confirmation'=>['required','same:password','min:6','max:255']
    ];
    public function render()
    {
        return view('components.main.reactive.auth.reset-password');
    }


    public function changePassword()
    {
        $password=$this->validate();

        $user=Auth::user();

        if(Hash::check($password['password'],$user->password))
            $this->addError('samePassword','گذرواژه شما همین بوده است');

        if(Hash::check($password['old_password'],$user->password))
            $user->update(['password'=>Hash::make($this->password)]);
        else
            $this->addError('old_password','رمز عبور صحیح نمیباشد');
    }
}
