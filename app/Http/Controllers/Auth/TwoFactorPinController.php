<?php

namespace App\Http\Controllers\Auth;

use App\TwoFactorPin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorPinController extends Controller
{
    public function require()
    {
        return view('auth.2FA');
    }

    public function authenticate(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var TwoFactorPin $pin */
        $pin = $user ->lastPin();
        if($pin->consume())
        {
            session('2fa_pin','true');
            return redirect('/');
        }
        return redirect('/authenticate')->withErrors(['Invalid PIN Supplied. Please try again.']);
    }

}
