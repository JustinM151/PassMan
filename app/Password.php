<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $fillable = ['username', 'portal_id', 'description'];

    public function portal()
    {
        return $this->belongsTo(Portal::class)->first();
    }
}
