<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Traits\Register;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    use Register;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {
        $data = $this->validation($request);

        if ($data) {
            $user = User::create($data);

            if (isset($user->id))
                return redirect($this->redirectTo);
            else
                return redirect('register')->with(['create'], ['false']);
        }
    }
}