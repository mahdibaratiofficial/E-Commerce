<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Open OAuth Page Of Google
     *
     * @return void
     */
    public function openGoogleOAuth()
    {
        return Socialite::driver('google')->redirect();
    }
}
