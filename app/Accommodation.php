<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $guarded = ['id'];

    public function getHotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel');
    }
}
