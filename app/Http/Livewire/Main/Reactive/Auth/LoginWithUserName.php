<?php

namespace App\Http\Livewire\Main\Reactive\Auth;

use App\Http\Controllers\Auth\Traits\Login;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LoginWithUserName extends Component
{
    use Login;
    public $username;

    public $password;

    public $error;

    protected $rules = [
        'username' => ['required', 'min:3', 'max:255'],
        'password' => ['required', 'min:6', 'max:255']
    ];

    protected $messages = [
        'username.required' => 'وارد کردن نام کاربری یا ایمیل یا شماره اجباری است',
        'password.required' => 'وارد کردن گذرواژه اجباری است',
        'username.min' => 'نام کاربری باید حداقل 3 کاراکتر باشد',
        'password.min' => 'گذر واژه باید حداقل 6 کاراکتر باشد'
    ];

    public $rememberMe = false;
    public function render()
    {
        return view('components\main\reactive\auth\login-with-user-name');
    }

    public function submit()
    {
        $data = $this->validate();

        try {
            $user = $this->check($data);

            if ($user) {
                Auth::login($user);

                if (Auth::hasUser())
                    return redirect()->to('/');
                else
                    $this->error = "ورود با خطا مواجه شد";
            } else {
                $this->error = "نام کاربری یا رمز عبور اشتباه است";
            }
        }catch(\Exception $e)
        {
            return redirect()->to('login');
        }
    }
}