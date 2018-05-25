<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwoFactorPinController extends Controller
{
    public function require()
    {
        return view('auth.2FA');
    }
}
