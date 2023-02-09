<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use PhpParser\Node\Expr\Cast\Object_;
use App\Http\Controllers\Auth\Traits\Login as LoginTrait;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    use LoginTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = ProvidersRouteServiceProvider::HOME;


    /**
     * Login User
     *
     * @param Request $request
     * @return void
     */
    public function login()
    {
        $data = $this->validation($request);

        $user = $this->check($data);

        if (!$user)
            Redirect::to('login');
        
        Auth::login($user);

        if (!Auth::hasUser())
            return redirect()->to('login');

        return redirect()->to($this->redirectTo);  
    }

    /**
     * Logout User 
     * Ps: I decided to perform the logout operation in this file, this may violate the first principle of Solid, but I did not see the need to create a new file for logout.
     *
     * @return Redirector
     */
    public function logOut()
    {
        Auth::logout();

        if (!Auth::hasUser())
            return redirect()->route('login');
    }
}
