<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorisedHelper extends Model
{
    //

    function police(){

        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }
}
