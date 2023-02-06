<?php

use App\Models\PasswordReset;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::view('/', 'layouts.index');

// Login & Logout Routes------------------------------------------------

Route::view('login', 'auth.login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logOut']);

// OTP Login
// Social Login

//End Login & Logout Routes---------------------------------------------



// Register Routes------------------------------------------------------

Route::view('register', 'auth.register');
Route::post('register', [RegisterContoller::class, 'register']);

//OTP Controller Routes
// Social Login Controller Routes


// End Register Routes--------------------------------------------------




