<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact_person', 'phone', 'nation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function competitors()
    {
        return $this->hasMany('App\Competitor');
    }

    public function provisional()
    {
        return $this->hasMany('App\Provisional');
    }

    public function officials()
    {
        return $this->hasMany('App\Officials');
    }
    public function travelSchedule()
    {
        return $this->hasMany('App\TravelSchedule');
    }
}
