<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\AuthorisedHelper;
use App\SocialService;
use App\PoliceStation;
use App\Emergency;
use App\Message;
use App\CrowdReport;
use Illuminate\Support\Facades\Hash;

class apiService extends Controller
{
    //

    private $token = "abs";

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

    function report_crowd(Request $request){

        $params;
        $status = 400;

       
        if($request->input('token') === $this->token){
            
            if($request->input('message')!=''){

                $new = new CrowdReport;
                $new->message = $request->input('message');
                $new->status = 0;
                $new->save();

                $params['message'] = "Message sent!";
                $status = 200;
                


            }else{
                $params['message'] = "Type a valid message";
                
            }            
        }else{
                $params['message'] = "Invalid action";
                
        }


        return  response()->json($params, $status);

    }



    function announcement(Request $request){

        $params;
        $status = 400;

        if($request->input('token') === $this->token){

            $params = Message::Where([
                ['message_type', '=', "Home"]
                
            ])->get();

            $status = 200;

        }else{
            
            $params['message'] = "Invalid action";
            $status = 400;
        
        }


        return  response()->json($params, $status);

    }



    function emergency(Request $request){

        $params;
        $status = 400;

        if($request->input('token') === $this->token){
            
            if($request->input('name')!='' || $request->input('number')!='' || $request->input('lan')!='' || $request->input('lon')!=''){

                $new = new Emergency;
                $new->name = $request->input('name');
                $new->number = $request->input('number');
                $new->gps_lan = $request->input('lan');
                $new->gps_lon = $request->input('lon');
                $new->status = "Received";
                $new->save();

                $params['message'] = "Message Received!";
                $status = 200;
                


            }else{
                $params['message'] = "Type a valid inputs";
              
            }            
        }else{
                $params['message'] = "Invalid action";
           
        }


        return  response()->json($params, $status);

    }




}
