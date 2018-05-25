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
        /** @var User $user */
        $user = Auth::user();
        /** @var TwoFactorPin $pin */
        $pin = $user->lastPin();
        if(empty($pin) || !$pin->isValid()) {
            //issue a new PIN
            /** @var TwoFactorPin $pin */
            $pin = new TwoFactorPin();
            $user->notify(new \App\Notifications\TwoFactorPin($pin->issueToUser($user)));
        }
        return view('auth.2FA');
    }

    public function authenticate(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var TwoFactorPin $pin */
        $pin = $user->lastPin();
        if($pin->consume($request->pin))
        {
            session(['2fa_pin'=>'true']);

            return redirect('/home');
        }
        return redirect('/authenticate')->withErrors(['Invalid PIN Supplied. Please try again.']);
    }

    public function resend()
    {
        /** @var User $user */
        $user = Auth::user();
        //issue a new PIN
        $pin = new TwoFactorPin();
        $user->notify(new \App\Notifications\TwoFactorPin($pin->issueToUser($user)));
        return redirect()->back();
    }

}
