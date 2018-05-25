<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TwoFactorPin extends Model
{
    protected $dates = ['created_at', 'updated_at', 'consumed_at'];

    public function isValid()
    {
        return $this->active && empty($this->consumed_at) && !$this->isExpired();
    }

    public function isExpired()
    {
        return $this->created_at<Carbon::now()->subMinutes(15);
    }

    public function consume($pin)
    {
        if(strtolower($pin) != strtolower($this->pin)) {
            return false;
        }

        if(!$this->isValid()) {
            return false;
        }

        $this->consumed_at = Carbon::now();
        $this->active = false;
        $this->save();
        return true;
    }

    public function issueToUser(User $user)
    {
        $chars = "123456789ABCDEF123456789GHJKMNP123456789QRSTU123456789VWXYZ123456789";
        $chars = str_shuffle($chars);
        $this->pin = substr($chars,0,6);
        $this->user_id = $user->id;
        $this->save();
        return $this->pin;
    }
}
