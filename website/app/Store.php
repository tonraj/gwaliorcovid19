<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //


    function police(){

        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }
}
