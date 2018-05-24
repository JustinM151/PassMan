<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $fillable = ['name', 'url', 'description'];

    public function passwords()
    {
        return $this->hasMany(Password::class);
    }
}
