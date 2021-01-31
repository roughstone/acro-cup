<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function competitors()
    {
        return $this->belongsToMany('App\Competitor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
