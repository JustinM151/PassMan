<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TwoFactorPin extends Model
{
    protected $dates = ['created_at', 'updated_at', 'consumed_at'];

    public function isValid()
    {
        return $this->active && empty($this->consumed_at) && $this->created_at>Carbon::now()->subMinutes(15);
    }

    public function consume()
    {
        if(!$this->isValid()) {
            return false;
        }

        $this->consumed_at = Carbon::now();
        $this->active = false;
        $this->save();
        return true;
    }
}
