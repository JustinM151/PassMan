<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
    public function setup()
    {
        $this->createAdmin();
        $this->createUsers();
    }

    private function createAdmin()
    {
        $user = new User();
        $user->name = env('ADMIN_NAME', 'Admin');
        $user->email = env('ADMIN_EMAIL');
        $user->password = Hash::make(env('ADMIN_PASSWORD'));
        $user->is_admin = true;
        $user->save();
    }

    private function createUsers()
    {
        $user = new User();
        $user->name = env('USER_NAME', 'User');
        $user->email = env('USER_EMAIL', 'user@example.com');
        $user->password = Hash::make(env('USER_PASSWORD', 'localpass'));
        $user->save();
    }

}
