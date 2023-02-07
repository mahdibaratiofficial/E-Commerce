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
use App\Http\Controllers\Auth\RegisterContoller;

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

// Login & Logout Routes------------------------------------------------

Route::view('login', 'auth.login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logOut']);

//End Login & Logout Routes---------------------------------------------



// Register Routes------------------------------------------------------

Route::view('register', 'auth.register');
Route::post('register', [RegisterContoller::class, 'register']);

// End Register Routes--------------------------------------------------


// OAuth Routes---------------------------------------------------------

Route::get('oauth/{social}', [OAuthFactoryController::class, 'openOAuthPage']);
Route::get('oauth/{social}/check', [OAuthFactoryController::class, 'OAuthCallBack']);

Route::get('test', function () {
    return Auth::user();
});




