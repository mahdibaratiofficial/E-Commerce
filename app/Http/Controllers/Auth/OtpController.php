<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function login(Request $request)
    {
        ActiveCode::generateCode();
    }
}