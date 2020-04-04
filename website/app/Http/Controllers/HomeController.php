<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\AuthorisedHelper;
use App\SocialService;
use App\PoliceStation;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function social(Request $request){

        if($request->isMethod('get')){
            $action = $request->get('action');

            $id = $request->get('id');

            $post = SocialService::find($id);



            if($action == 'remove'){
                
                if ($post != null) {
                    $post->delete();
                    Session::flash('alert-success', 'Request has been deleted.');
                }
            }

            if($action == 'approve'){
                
                if ($post != null) {
                    $post->status = "Approved";
                    $post->save();
                    Session::flash('alert-success', 'Request has been approved.');
                }
            }

            if($action == 'reject'){
                
                if ($post != null) {
                    $post->status = "Rejected";
                    $post->save();
                    Session::flash('alert-success', 'Request has been Rejected.');
                }
            }
        }
      
        $query_s = ($request->input('query') != '') ? $request->input('query') : null;


        $build = collect([]);

        if($query_s == null){
            
            $social = SocialService::where($build->all())->latest()->paginate(25);

        }else{
                       
            if($query_s!=null){
                $build->push(['name', 'like', '%'.$query_s.'%']);
            }


            
            

            $social = SocialService::where($build->all())->paginate(25);
        }

        //dd($social);

        return view('SocialService', ["services" => $social, "police" => PoliceStation::all()]);
    }

    public function helper(Request $request){

        if($request->isMethod('get')){
            $action = $request->get('action');
            if($action == 'remove'){
                $id = $request->get('id');

                $post = AuthorisedHelper::find($id);

                if ($post != null) {
                    $post->delete();
                    Session::flash('alert-success', 'Officer has been deleted.');
                }
            }
        }
      
        if($request->isMethod('POST')){

            $value = $request->validate([
                'name' => 'required',
                'polic' => 'required',
                'phone' => 'required|max:10',
            ],
            [
                'name.required' => 'Enter shop name.',
                'polic.required' => 'Please slect a nearby police station',
                'phone.required' => 'Please enter shop phone number',
                'phone.max' => 'Please enter a valid shop phone number',
            ]);

            $new = new AuthorisedHelper;

            $new->name = $value['name'];
            $new->number = $value['phone'];
            $new->police_station_id = $value['polic'];
            
            $new->save();

            

            Session::flash('alert-success', 'Officer successfully added.');

        }

        $query_s = ($request->input('query') != '') ? $request->input('query') : null;


        $build = collect([]);

        if($query_s == null){
            
            $helper = AuthorisedHelper::where($build->all())->latest()->paginate(25);

        }else{
                       
            if($query_s!=null){
                $build->push(['name', 'like', '%'.$query_s.'%']);
            }


            
            

            $helper = AuthorisedHelper::where($build->all())->paginate(25);
        }



        return view('Helper', ["helpers" => $helper, "police" => PoliceStation::all()]);
    }

    public function stores(Request $request){




        if($request->isMethod('get')){
            $action = $request->get('action');
            if($action == 'remove'){
                $id = $request->get('id');

                $post = Store::find($id);

                if ($post != null) {
                    $post->delete();
                    Session::flash('alert-success', 'Store has been deleted.');
                }
            }
        }

       

        if($request->isMethod('POST')){

            $value = $request->validate([
                'shop' => 'required',
                'address' => 'required',
                'polic' => 'required',
                'phone' => 'required|max:10',
                'lat' => 'required',
                'lond' => 'required',
            ],
            [
                'shop.required' => 'Enter shop name.',
                'address.required' => 'Please enter shop address',
                'polic.required' => 'Please slect a nearby police station',
                'phone.required' => 'Please enter shop phone number',
                'phone.max' => 'Please enter a valid shop phone number',
                'lat.required' => 'Enter shop latintue.',
                'lond.required' => 'Enter shop landitude.',
            ]);

            $new = new Store;

            $new->shop_name = $value['shop'];
            $new->phone_num = $value['phone'];
            $new->password = Hash::make('phone');
            $new->current_status = "Active";
            $new->address = $value['address'];
            $new->police_station_id = $value['polic'];
            $new->lat = $value['lat'];
            $new->lon = $value['lond'];
            $new->save();

            if($request->input('sms')){
                $message = "You have been registered to Gwalior Covid19 Safe Program, Password: ". $value['phone'];
                $this->sendSMS($message, $value['phone']);
            }

            Session::flash('alert-success', 'Store successfully added.');

        }

        $params = [];

        $crowd = ($request->input('crowd') != '') ? true : false;
        $status = ($request->input('status') != '') ? $request->input('status') : null;
        $query_s = ($request->input('query') != '') ? $request->input('query') : null;


        $build = collect([]);

        if($request->input('crowd') == null && $status == null && $query_s == null){
            
            $store = Store::where($build->all())->latest()->paginate(25);

        }else{
                       
            if($query_s!=null){
                $build->push(['shop_name', 'like', '%'.$query_s.'%']);
            }

            if($request->input('crowd')!=null){
                
                $build->push(['crowd', '=', $crowd]);
            
            }

            if($status!=null){
                $build->push(['current_status', '=', $status]);
            }

            
            

            $store = Store::where($build->all())->paginate(25);
        }

      
        
        return view('Stores', ["stores"=>$store, "helper" => PoliceStation::all()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    private function sendSMS($message, $number){


        $authKey =env('MSG_SENDER_NAME');

        $mobileNumber =  $number;

        $senderId = "GWLCVD";

        $message = urlencode($message);

        $route = "default";
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

        $url="http://api.msg91.com/api/sendhttp.php";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));


        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        $output = curl_exec($ch);

        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);

        return true;
    }

}
