<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $guarded = [
        'id'
    ];

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
    public function directive()
    {
        return $this->hasOne('App\Directive');
    }
}
