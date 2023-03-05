<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuth\OAuthFactoryController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\RegisterContoller;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\SingleProductController;
use App\Models\Attribute;
use App\Models\attributeValue;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use App\Services\Cart\CartService;
use Database\Factories\AttributeFactory;
use Illuminate\Support\Facades\Cookie;

use App\Services\Cart\Cart;

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

Route::view('/', 'main.index')->name('home');


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
    // OAuth Routes Ends-----------------------------------------------------------------

    // login with number --------------------------------------------------------------------
    Route::post('login-with-number', [OtpController::class, 'login'])->name('otp.login');
    // Ends OAuth Routes------------------------------------------------------------------
});


/*
* Authentication status is not important for this routes:
*/

// Reset Password Routes------------------------------------------------------------------
Route::get('password/reset',[ResetPasswordController::class,'openpage']);
Route::post('generate/password/reset',[ResetPasswordController::class,'generateAResetPassword'])->name('generate.password.reset');
Route::get('change/password/{token}',[ResetPasswordController::class,'ResetPasswordPage'])->name('password.change');
Route::post('reset/password',[ResetPasswordController::class,'resetPassword'])->name('reset.password');
// Reset Password Routes Ends-------------------------------------------------------------

Route::middleware(['auth'])->group(function () {
    // LogOut Roues-----------------------------------------
    Route::post('logout', [LoginController::class, 'logOut'])->name('logout');
    // End LogOut Roues-------------------------------------


    // Profile Routes---------------------------------------
    Route::get('@{user}/profile',[ProfileController::class,'getUser']);
    // End Profile Routes-----------------------------------
});


Route::get('test/', function () {

});


// Products Routes---------------------------------------------------------
Route::get('product/{product}',[SingleProductController::class,'getProduct'])->name('product');


// Cart------------------------

Route::view('cart', 'main.cart.cart');