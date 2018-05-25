<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class EnforceTwoFactorAuthentication
{
    protected $except_urls = [
        '/',
        'setup',
        'login',
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
        $regex = '#' . implode('|', $this->except_urls) . '#';
        //dd(preg_match($regex, $request->path()));
        if(!preg_match($regex, $request->path())) {
            /** @var User $user */
            $user = Auth::user();
            $pin = empty($user->lastPin()->pin) ? '99999999':$user->lastPin()->pin;
            if ($user->enforce_2fa && session('2fa_pin') != 'true') {
                //stop them in their tracks
                return redirect('/authenticate');
            }
        }
        return $next($request);
    }
}
