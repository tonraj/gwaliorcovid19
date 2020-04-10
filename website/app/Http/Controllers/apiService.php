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
use App\MapData;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class apiService extends Controller
{
    //

    private $token = "abs";

    function data(Request $request){ 

        $get_content = json_decode(file_get_contents("https://covidapi.info/api/v1/country/IND"), true);

        $d = array_key_last ( $get_content['result'] );
        $params = $get_content['result'][$d];

        return  response()->json($params); 
        
    }


    function statuscrowd(Request $request){

        $params = [];
        $status_ = 400;

        $phone = $request->input('login');
        $status = $request->input('status');
        

        try {
            
            $phone = Crypt::decryptString($phone);
            $check = Store::Where([
                ['phone_num', "=",  $phone]
            ])->first();
            
            $check->crowd = (int)$status;
            $check->save();
            
            $status_ = 200;

        
        } catch (DecryptException $e) {

            $status_ = 400;
            
        }

        return  response()->json($params, $status_);


    }

    function statuschange(Request $request){

        $params = [];
        $status_ = 400;

        $phone = $request->input('login');
        $status = $request->input('status');
        

        try {
            
            $phone = Crypt::decryptString($phone);
            $check = Store::Where([
                ['phone_num', "=",  $phone]
            ])->first();
            
            $check->current_status = $status;
            $check->save();
            
            $status_ = 200;

        
        } catch (DecryptException $e) {

            $status_ = 400;
            
        }

        return  response()->json($params, $status_);


    }

    function store_data(Request $request){

        $phone = $request->input('login');
        

        try {
            
            $phone = Crypt::decryptString($phone);
            $check = Store::Where([
                ['phone_num', "=",  $phone]
            ])->first();
            $params['data'] = $check;
            $status = 200;

        
        } catch (DecryptException $e) {

            $status = 400;
            
        }

        return  response()->json($params, $status);


    }

    function login(Request $request){

        $status = 400;

        $phone = $request->input('phone');
        $password = $request->input('password');

        $check = Store::Where([
            ['phone_num', "=",  $phone]
        ])->first();

        $chk = Hash::check($password, $check->password);

        if($chk){
            $params['message'] = Crypt::encryptString($phone);
            $status = 200;
        }else{
            $params['message'] = "Wrong phone number or password";
        }

        return  response()->json($params, $status);
    }

    function map(){

        $collection = collect([]);

        $stores = Store::Where([
            ['current_status', "=", "Open"],
			['crowd', "=", 0]
        ])->get();


        foreach($stores as $store){
            $collection->push([$store->shop_name, $store->lat, $store->lon, $store->address, $store->icon_img]);
        }


        $socials = SocialService::Where([
            ['end_time', '<=' , date('Y-m-d H:i:s', time())],
            ['status', '=' , "Approved"],
        ])->get();

        foreach($socials as $social){
            $collection->push([$social->title, $social->lat, $social->lon, $social->address, 'https://maps.google.com/mapfiles/ms/icons/shopping.png']);
        }

        $maps = MapData::Where([
            ['status', '=' , 1 ],
        ])->get();

        foreach($maps as $map){
            $collection->push([$map->title, $map->lan, $map->lon, $map->address, $map->icon_image]);
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
