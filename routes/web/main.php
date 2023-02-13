<?php

use App\Models\PasswordReset;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuth\OAuthFactoryController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\RegisterContoller;
use App\Http\Controllers\Profile\ProfileController;
use App\Models\ActiveCode;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'main.index');


Route::middleware(['guest'])->group(function () {
    // Login Routes------------------------------------------------
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    //End Login Routes---------------------------------------------


    // Register Routes------------------------------------------------------
    Route::view('register', 'auth.register')->name('register');
    Route::post('register', [RegisterContoller::class, 'register'])->name('register');
    // End Register Routes--------------------------------------------------

    // OAuth Routes----------------------------------------------------------------------
    Route::get('oauth/{social}', [OAuthFactoryController::class, 'openOAuthPage'])->name('oauth');
    Route::get('oauth/{social}/check', [OAuthFactoryController::class, 'OAuthCallBack'])->name('oauth.callback');
    // Ends OAuth Routes------------------------------------------------------------------

});

Route::post('login-with-number', [OtpController::class, 'login'])->name('otp.login');

Route::middleware(['auth'])->group(function () {
    // LogOut Roues-----------------------------------------
    Route::post('logout', [LoginController::class, 'logOut'])->name('logout');
    // End LogOut Roues-------------------------------------


    // Profile Routes---------------------------------------
    Route::get('@{user}/profile',[ProfileController::class,'getUser']);
    // End Profile Routes-----------------------------------
});


Route::get('test', function () {
    $user=User::factory()->for(Post::factory())->create();

    // ActiveCode::generateCode();
});




