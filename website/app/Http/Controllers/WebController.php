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
                'icon' => 'required',
                'lond' => 'required',
                'password' => 'required',
            ],
            [
                'shop.required' => 'Enter shop name.',
                'icon.required' => 'Select store type.',
                'address.required' => 'Please enter shop address',
                'polic.required' => 'Please slect a nearby police station',
                'phone.required' => 'Please enter phone number',
                'phone.max' => 'Please enter a valid phone number',
                'lat.required' => 'Enter shop latintue.',
                'lond.required' => 'Enter shop landitude.',
                'password.required' => 'Enter shop landitude.',
            ]);

            if($value['icon'] == "Medical"){

                $icon = "https://img.icons8.com/office/16/000000/health-book.png";

            }

            if($value['icon'] == "Grocery"){

                $icon = "http://maps.google.com/mapfiles/ms/icons/shopping.png";

            }

            $new = new Store;

            $new->shop_name = $value['shop'];
            $new->phone_num = $value['phone'];
            $new->icon_img = $icon;
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
                'name.required' => 'Enter your name.',
                'address.required' => 'Please enter service address',
                'polic.required' => 'Please select a nearby police station',
                'phone.required' => 'Please enter your phone number',
                'phone.max' => 'Please enter a valid  phone number',
                'lat.required' => 'Enter service latintue.',
                'lond.required' => 'Enter service langitude.',
                'time.required' => 'Select or type service end time.',
                'title.required' => 'Enter your service title',
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
                'name.required' => 'Enter the message.',
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
                'name.required' => 'Enter your name.',
                'polic.required' => 'Select the police station.',
                'number.required' => 'Please enter your valid phone number.',
                'number.max' => 'Please enter your valid phone number',
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
