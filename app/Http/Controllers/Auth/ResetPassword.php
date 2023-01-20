<?php
namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function generateAResetPassword(Request $request)
    {

        $data = $request->validate([
            'email' => ['required', 'exists:users,email']
            ]
        );

        if (!$data['email'])
            return 'reset page with errors';

        $reset=$this->createRessetPasswordRow($data['email']);

        $submitedResetEmail=PasswordReset::where('email', $reset['email'])->first();

        if ($submitedResetEmail)
            $this->sendResetPasswordLink($submitedResetEmail['email'], $submitedResetEmail['token']);
    }


    private function createRessetPasswordRow($email)
    {
        $reset=PasswordReset::create([
            'email'=>$data['email'],
            'token'=>Str::random(60),
            'expire_at'=>Carbon::now()->addMinutes(60)
        ]);

        return $reset;
    }


    public function sendResetPasswordLink($email,$token)
    {
        return 'send Email';
    }

    public function ResetPasswordPage($token)
    {
        $PR_token=PasswordReset::where('token', $token)->first();

        if ($PR_token < 1)
            return 'reset password page with token';
        else
            return 'go to reset page with error';

        return 'setPasswordView';
    }

    public function resetPassword(Request $request)
    {
        $password=$request->validate([
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'confirmed'],
            '_token'=>['required','exists:password_resets,token']
        ]);

        $token=PasswordReset::where('token', $password['_token'])->first();

        if ($token < 1)
            return 'redirect to reset page with error';

        if ($token['expire_at'] < Carbon::now())
            return 'redirect and say expire error';


        User::update([
            'password'=>Hash::make($password['password'])
        ]);

        return 'ok';

    }
}



?>