<?php

namespace App\Http\Middleware;

use App\TwoFactorPin;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class EnforceTwoFactorAuthentication
{
    protected $except_urls = [
        'setup',
        'login',
        'logout',
        'register',
        'authenticate'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $regex = '#' . implode('|', $this->except_urls) . '#';

            if(!preg_match($regex, $request->path())) {
                /** @var User $user */
                $user = Auth::user();

                if ($user->enforce_2fa && $request->session()->get('2fa_pin','false') != 'true') {
                    //stop them in their tracks
                    return redirect('/authenticate');
                }
            }
        }
        return $next($request);
    }
}
