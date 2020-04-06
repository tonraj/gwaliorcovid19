<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\AuthorisedHelper;
use App\SocialService;
use App\PoliceStation;
use App\Emergency;
use App\Message;
use Illuminate\Support\Facades\Hash;

class apiService extends Controller
{
    //

    function map(){

        $collection = collect([]);

        $stores = Store::Where([
            ['current_status', "=", "Open"]
        ])->get();


        foreach($stores as $store){
            $collection->push([$store->shop_name, $store->lat, $store->lon, $store->address, 'http://maps.google.com/mapfiles/ms/icons/shopping.png']);
        }


        $socials = SocialService::Where([
            ['end_time', '<=' , date('Y-m-d H:i:s', time())],
            ['status', '=' , "Approved"],
        ])->get();

        foreach($socials as $social){
            $collection->push([$social->title, $social->lat, $social->lon, $social->address, 'http://maps.google.com/mapfiles/ms/icons/shopping.png']);
        }


        return $collection;
        
    }
}
