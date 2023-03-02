<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getUser(User $user)
    {
        $userInstance=$user;
        if(Auth::user()->username == $userInstance->username)
            return view('main.profile.profile', compact('userInstance'));
    }
}
