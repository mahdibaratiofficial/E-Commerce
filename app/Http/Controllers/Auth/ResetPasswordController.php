<?php
namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

    public function __construct()
    {
        $this->deleteExpireTokens();
    }
    public function openpage()
    {
        return view('auth.resetpassword.resetpassword');
    }
    public function generateAResetPassword(Request $request)
    {

        $data = $request->validate(
            [
                'email' => ['required', 'exists:users,email']
            ]
        );

        if (!$data['email'])
            return 'reset page with errors';

        $reset = $this->createRessetPasswordRow($data['email']);

        $submitedResetEmail = PasswordReset::where('email', $reset['email'])->first();

        if ($submitedResetEmail)
            return true;    
            // $this->sendResetPasswordLink($submitedResetEmail['email'], $submitedResetEmail['token']);
    }


    private function createRessetPasswordRow($email)
    {
        $reset = PasswordReset::create([
            'email' => $email,
            'token' => Str::random(60),
            'expire_at' => Carbon::now()->addMinutes(60)
        ]);

        PasswordReset::where('email',$email)->where('expire_at','<',now())->delete();

        return $reset;
    }


    public function sendResetPasswordLink($email, $token)
    {
        return 'send Email';
    }

    public function ResetPasswordPage($token)
    {
        $latestToken=PasswordReset::max('expire_at');

        $PR_token = PasswordReset::where('token', $token)->where('expire_at',$latestToken)->first();

        if (!$PR_token instanceof PasswordReset)
            return view('auth.resetpassword.resetpassword',['error'=>'not-found']);

        if($PR_token->expire_at < now())
            return view('auth.resetpassword.resetpassword',['error'=>'expire']);

        return view('auth.resetpassword.changePassword',['_reset_password_token'=>$PR_token->token]);
    }

    public function resetPassword(Request $request)
    {
        $password=$this->validation($request);

        $token=$this->checkToken($password['_reset_password_token']);

        $this->changePassword($token,$password['password']);

        return redirect()->route('login');
    }

    public function checkToken(string $token)
    {
        $token = PasswordReset::where('token', $token)->first();

        if (!$token instanceof PasswordReset)
            return 'redirect to reset page with error';

        if ($token['expire_at'] < Carbon::now())
            return 'redirect and say expire error';

        return $token;
    }

    public function changePassword($token,$password)
    {
        $user=User::where('email',$token['email'])->first();

        if($user)
            $user->update(['password' => Hash::make($password)]);

        $this->deleteUsedToken($token['token']);

        return true;
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required','same:password'],
            '_reset_password_token' => ['required', 'exists:password_resets,token']
        ]);
    }

    public function deleteUsedToken($token)
    {
        return PasswordReset::where('token',$token)->delete();
    }

    public function deleteExpireTokens()
    {
        return PasswordReset::where('expire_at','<',now())->delete();
    }
}