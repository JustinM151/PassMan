<?php

namespace App\Http\Controllers;

use App\FuzionPass\PasswordService;
use App\Http\Requests\StorePasswordRequest;
use App\Http\Requests\StoreRandomPasswordRequest;
use App\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib\Crypt\Hash;

class PasswordController extends Controller
{

    public function store(StorePasswordRequest $request)
    {
        $password = new Password($request->input());
        $password->password = encrypt($request->password);
        $password->user_id = Auth::user()->id;
        $password->save();

        return redirect()->back()->with('status', 'Password Successfully saved');
    }

    public function show(Password $pass)
    {
        $portal = $pass->portal();
        $pass->password = decrypt($pass->password);
        return view('passwords.show')->with('password',$pass)->with('portal',$portal);
    }

    public function storeRandom(StoreRandomPasswordRequest $request)
    {

        $password = new Password($request->input());
        $password->password = encrypt(PasswordService::randomPass(!empty($request->length) ? $request->length:32, !empty($request->restrict) ? $request->restrict:''));
        $password->user_id = Auth::user()->id;
        $password->save();

        return redirect()->back()->with('status', 'Password Successfully saved');
    }


}
