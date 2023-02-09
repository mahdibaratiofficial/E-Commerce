<?php

namespace App\Http\Livewire\Main\Reactive\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $username;

    public $email;

    public $password;

    public $type;

    public $password_confirmation;


    protected $rules = [
        'username'=>['required','unique:users,username'],
        'email'=>['required','email','unique:users,email'],
        'password'=>['required','min:8','max:255'],
        'password_confirmation'=>['required','same:password','min:8','max:255']
    ];

    protected $messages = [
        'username.unuque'=>'این نام کاربری قبلا استفاده شده',
        'email.required'=>'وارد کردن ایمیل الزامی است',
        'email.unique'=>'این ایمیل قبلا استفاده شده',
        'email.email'=>'لطفا ایمیل را به طور صحیح وارد کنید',
        'password.required'=>'ساخت گذرواژه الزامی است',
        'password.min'=>'حداقل 8 حرف برای گذرواژه تعین کنید',
        'password.max'=>'گذر واژه بیشتر از حد مجاز است',
        'password_confirmation.required'=>'گذرواژه را تایید کنید',
        'password_confirmation.same'=>'گذرواژه ها مطابقت ندارند',
        'password_confirmation.min'=>'حداقل 8 حرف برای گذرواژه تعین کنید',
        'password_confirmation.max'=>'گذر واژه بیشتر از حد مجاز است'
    ];

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }
    public function render()
    {
        return view('components.main.reactive.auth.register');
    }

    public function register()
    {
        $data=$this->validate();

        $this->createUser($data);
    }

    public function createUser(array $data)
    {
        unset($data['password_confirmation']);

        $data['password']=Hash::make($data['password']);

        $user=User::create($data);

        if ($user)
            return redirect('login');
        else
            return redirect('register');
    }
}
