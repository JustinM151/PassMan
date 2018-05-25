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
}
