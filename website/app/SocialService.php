<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialService extends Model
{
    //
    function police(){

        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }

}
