<?php

namespace App\Http\Controllers;

use App\Http\Requests\SMSNumberRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        /** @var User $user */
        $viewer = Auth::user();
        if($viewer->can('view', $user)) {
            return view('users.show')->with('user',$user);
        }
        abort(403, 'You do not have permission to view that users profile.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * @param SMSNumberRequest $request
     * @param User $user
     */
    public function update2FA(SMSNumberRequest $request, User $user)
    {
        $country = preg_replace('/[^0-9]/', '', $request->country_code);
        $phnum = preg_replace('/[^0-9]/', '', $request->sms_number);

        if(strlen($phnum)<10 || strlen($country)<1) {
            return redirect()->back()->withErrors(['SMS Number must be at least 10 numbers and country code must be at least 1 digit.']);
        }

        $user->country_code = $country;
        $user->sms_number = $phnum;
        $user->enforce_2fa = $request->enforce_2fa;
        $user->save();

        dd(session('2fa_pin'));
        if($user->enforce_2fa) {
            //session('2fa_pin', 'true');
        }

        return redirect()->back()->with('info', 'Two Factor Auth Preferences Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
