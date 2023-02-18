<?php
namespace App\Http\Controllers\Auth\OAuth\Socials;

use App\Http\Controllers\Auth\OAuth\socialsinterfaces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PDO;

class Google implements socialsinterfaces
{
    public function openOAuthPage($social = 'google')
    {
        return Socialite::driver($social)->redirect();
    }


    public function OAuthCallBack($social = "google")
    {
        $user = Socialite::driver($social)->user();

        if ($this->userExist($user->email))
            return $this->Login($user->email);
        else
            return $this->createUser($user->user);

    }

    private function createUser($user)
    {
        // dd($user->user);
        $data = [
            'name' => $user["name"],
            'email' => $user["email"],
        ];
        $userCreated = User::create($data);

        if ($userCreated) {
            $this->verifyEmail($userCreated);
            return redirect('login');
        }
        else {
            return redirect('register')->with('error');
        }
    }

    private function Login($email)
    {
        $user = User::where('email', $email)->first();
        Auth::login($user);

        if (Auth::hasUser()) {
            $this->verifyEmail($user);

            return redirect('/');
        }
        else {
            return redirect('login');
        }
    }

    private function userExist($email)
    {
        if (User::where('email', $email)->first())
            return true;
        else
            return false;
    }

    private function verifyEmail(User $user)
    {
        if ($user instanceof User) {
            if (!$user->hasVerifiedEmail())
                $user->markEmailAsVerified();
        }
    }
}
?>