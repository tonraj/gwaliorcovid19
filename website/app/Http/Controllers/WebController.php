<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\AuthorisedHelper;
use App\SocialService;
use App\PoliceStation;
use App\CrowdReport;
use App\Emergency;
use App\Message;
use Illuminate\Support\Facades\Hash;
use Session;

use DateTime;


class WebController extends Controller
{
    //


    function store(Request $request){

        if($request->isMethod('POST')){

            $value = $request->validate([
                'shop' => 'required',
                'address' => 'required',
                'polic' => 'required',
                'phone' => 'required|max:10',
                'lat' => 'required',
                'lond' => 'required',
                'password' => 'required',
            ],
            [
                'shop.required' => 'Enter shop name.',
                'address.required' => 'Please enter shop address',
                'polic.required' => 'Please slect a nearby police station',
                'phone.required' => 'Please enter shop phone number',
                'phone.max' => 'Please enter a valid shop phone number',
                'lat.required' => 'Enter shop latintue.',
                'lond.required' => 'Enter shop landitude.',
                'password.required' => 'Enter shop landitude.',
            ]);

            $new = new Store;

            $new->shop_name = $value['shop'];
            $new->phone_num = $value['phone'];
            $new->password = Hash::make($value['password']);
            $new->current_status = "Pending";
            $new->address = $value['address'];
            $new->police_station_id = $value['polic'];
            $new->lat = $value['lat'];
            $new->lon = $value['lond'];
            $new->save();

            Session::flash('alert-success', 'Store successfully added.');

        }


        return view('Web.Store',[ "helper" => PoliceStation::all()]);
    }



    function socialservice(Request $request){


        if($request->isMethod('POST')){

            $value = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'polic' => 'required',
                'phone' => 'required|max:10',
                'lat' => 'required',
                'lond' => 'required',
                'title' => 'required',
                'time' => 'required',
            ],
            [
                'name.required' => 'Enter shop name.',
                'address.required' => 'Please enter shop address',
                'polic.required' => 'Please slect a nearby police station',
                'phone.required' => 'Please enter shop phone number',
                'phone.max' => 'Please enter a valid shop phone number',
                'lat.required' => 'Enter shop latintue.',
                'lond.required' => 'Enter shop landitude.',
                'time.required' => 'Enter shop landitude.',
                'title.required' => 'Enter shop landitude.',
            ]);

            $new = new SocialService;

            $new->title = $value['title'];
            $new->type = "Service";
            $new->address = $value['address'];
            $new->status = "Pending";
            $date = DateTime::createFromFormat('m/d/Y h:i A', $value['time']);
            $new->end_time = $date;
            $new->police_station_id = $value['polic'];
            $new->lat = $value['lat'];
            $new->lon = $value['lond'];
            $new->phone = $value['phone'];
            $new->name = $value['name'];
            $new->save();

            Session::flash('alert-success', 'Service has been sent to admin. They will review and approve it');

        }



        return view('Web.Social',[ "helper" => PoliceStation::all()]);
    }

    
    function report(Request $request){

        if($request->isMethod('POST')){

            $value = $request->validate([
                'message' => 'required',
            ],
            [
                'name.required' => 'Enter shop name.',
            ]);

            $new = new CrowdReport;

            $new->message = $value['message'];
            
            $new->save();

            Session::flash('alert-success', 'Thank you for reporting crowd.');

        }


        
        return view('Web.Crowd');
    }


    function officer(Request $request){


        if($request->isMethod('POST')){

            $value = $request->validate([
                'name' => 'required',
                'polic' => 'required',
                'number' => 'required|max:10',
            ],
            [
                'name.required' => 'Enter shop name.',
                'polic.required' => 'Please enter shop address',
                'number.required' => 'Please enter shop phone number',
                'number.max' => 'Please enter a valid shop phone number',
            ]);

            $new = new AuthorisedHelper;

            $new->name = $value['name'];
            $new->number = "number";
            $new->police_station_id = $value['polic'];
            
            $new->save();

            Session::flash('alert-success', 'Service has been sent to admin. They will review and approve it');

        }


        return view('Web.Officer',[ "helper" => PoliceStation::all()]);
    }
}
