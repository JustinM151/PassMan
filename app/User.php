<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function passwords()
    {
        return $this->hasMany(Password::class);
    }

    public function passwordsForName($name)
    {
        return $this->passwords()->where('name', $name)->get();
    }

    public function passwordsLikeName($name)
    {
        return $this->passwords()->where('name', 'like','%'.$name.'%')->get();
    }

    public function pins()
    {
        return $this->hasMany(TwoFactorPin::class);
    }

    public function lastPin()
    {
        return $this->pins()->orderBy('created_at','desc')->first();
    }

    public function sms_number()
    {
        return $this->country_code.$this->sms_number;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->sms_number();
    }
}
