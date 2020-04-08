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
use App\MapData;

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

    function homemessage(Request $request){

        if($request->isMethod('get')){

            $id = $request->input('id');

            $post = Message::find($id);


            if($request->input('action') == 'remove'){

                $post->delete();
                Session::flash('alert-success', 'Announcement is Deleted.');

                return redirect('/admin/announcement');
            }
        }

        if($request->isMethod('post')){

            if($request->input('add')=="add"){


                $value = $request->validate([
                    'link' => 'required',
                    'message' => 'required',
                ],
                [
                    'link.required' => 'Enter title.',
                    'message.required' => 'Select map data icon'
                ]);

               


                $new = new Message;

                $new->link = $value['link'];
                $new->message =  $value['message'];
                $new->message_type = "Home";
              
                $new->save();
                Session::flash('alert-success', 'Data added.');

            }
        }

        
        $build = collect([]);
        $build->push(['message_type', '=', 'Home']);

        $params['datas'] = Message::where($build->all())->latest()->paginate(25);

        return view('HomeMessage', $params);
    
    }


    function map(Request $request){

        if($request->isMethod('get')){

            $id = $request->input('id');

            $post = MapData::find($id);

            if($request->input('action') == 'close'){

                $post->status = 0;
                $post->save();
                Session::flash('alert-success', 'Map data changed to Close.');
                return redirect('/admin/map');
                

            }

            if($request->input('action') == 'open'){
                $post->status = 1;
                $post->save();
                Session::flash('alert-success', 'Map data changed to Open.');
                return redirect('/admin/map');
            }

            if($request->input('action') == 'remove'){

                $post->delete();
                Session::flash('alert-success', 'Map data is Deleted.');

                return redirect('/admin/map');
            }
        }

        if($request->isMethod('post')){

            if($request->input('add')=="add"){


                $value = $request->validate([
                    'title' => 'required',
                    'icon' => 'required',
                    'lan' => 'required',
                    'lon' => 'required',
                    'address' => 'required',
                ],
                [
                    'title.required' => 'Enter title.',
                    'icon.required' => 'Select map data icon',
                    'lan.required' => 'Paste labditude',
                    'lon.required' => 'Paste Londitute',
                    'address.required' => 'Enter address'
                ]);

                if($value['icon'] == "Shelter"){

                    $icon = "";

                }elseif($value['icon'] == 'Hospital'){

                    $icon = "";

                }


                $new = new MapData;

                $new->address = $value['address'];
                $new->title =  $value['title'];
                $new->icon_image = $icon;
                $new->lan = $value['lan'];
                $new->lon =  $value['lon'];

                $new->save();
                Session::flash('alert-success', 'Data added.');

            }
        }

        
        $build = collect([]);

        $params['mapdatas'] = MapData::where($build->all())->latest()->paginate(25);

        return view('Map', $params);
    
    }


    function crowd(Request $request){

        if($request->isMethod('get')){

            $id = $request->input('id');

            $post = CrowdReport::find($id);

            if($request->input('action') == 'seen'){

                $post->status = 1;
                $post->save();
                Session::flash('alert-success', 'Crowd market as seen.');
                return redirect('/admin/crowd');
                

            }

            if($request->input('action') == 'remove'){

                $post->delete();
                Session::flash('alert-success', 'Map data is Deleted.');

                return redirect('/admin/crowd');
            }
        }

        
        $build = collect([]);

        $params['services'] = CrowdReport::where($build->all())->latest()->paginate(25);

        return view('CrowdReport', $params);

    }

    public function bulkmessage(Request $request)
    {

        if($request->isMethod('POST')){


            $value = $request->validate([
                'number' => 'required',
                'message' => 'required',
            ],
            [
                'number.required' => 'Enter 10 digit phone number.',
                'message.required' => 'Type message'
            ]);


            $this->sendSMS($value['message'], $value['number']);

            if($request->input('home')!=null){

                $new = new Message;
                $new->message = $value['message'];
                $new->message_type = "Home";
                $new->save();

            }
            
            Session::flash('alert-success', 'Message sent.');






        }
        return view('BulkMessage');


    }

    public function message(Request $request)
    {

        if($request->isMethod('POST')){


            $value = $request->validate([
                'number' => 'required',
                'message' => 'required',
            ],
            [
                'number.required' => 'Enter 10 digit phone number.',
                'message.required' => 'Type message'
            ]);


            $this->sendSMS($value['message'], $value['number']);

            if($request->input('home')!=null){

                $new = new Message;
                $new->message = $value['message'];
                $new->message_type = "Home";
                $new->save();

            }
            
            Session::flash('alert-success', 'Message sent.');






        }
        return view('Message');


    }


    public function emergency()
    {

        $build = collect([]);

        $params['services'] = Emergency::where($build->all())->latest()->paginate(25);

        return view('Emergency', $params);


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
    public function index(Request $request)
    {

        if($request->isMethod('POST')){

            if($request->input('announcement') == 'add'){

                $value = $request->validate([
                    'link' => 'required',
                    'message' => 'required',
                ],
                [
                    'link.required' => 'Enter title.',
                    'message.required' => 'Select map data icon'
                ]);

               


                $new = new Message;

                $new->link = $value['link'];
                $new->message =  $value['message'];
                $new->message_type = "Home";
              
                $new->save();
                Session::flash('alert-success', 'New announcemen has been saved.');


            }

            if($request->input('home') == 'update'){

            $value = $request->validate([
                'helpline' => 'required',
                'cases' => 'required',
            ],
            [
                'helpline.required' => 'Type helpline number.',
                'cases.required' => 'Type  number of cases.'
            ]);


            $this->envUpdate('helpline', $value['helpline']);
            $this->envUpdate('cases', $value['cases']);
            Session::flash('alert-success', 'Home data successfully updated.');

            }

        }
        
        $params['emergency'] = Emergency::Where([
            ['status', "!=", "Seen"]
        ]);

        $params['social'] = SocialService::Where([
            ['status', '!=' , "Approved"],
        ]);

        $params['crowd'] = CrowdReport::Where([
            ['status', '=' , 0],
        ]);

        $params['stores'] = Store::Where([
            ['current_status', '=' , 'Pending'],
        ]);

        $path = base_path('covid.json');
        $params['data'] =  json_decode(file_get_contents($path), true);

        return view('home', $params);
    }


    private function sendSMS($message, $number){


        $authKey = env('MSG_SENDER_NAME');

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


    public static function envUpdate($key, $value)
    {
        $path = base_path('covid.json');

        if (file_exists($path)) {

            $file = file_get_contents($path);
            $json = json_decode($file, true);

            if($json[$key] === $value){
                return;
            }

            $json[$key] = $value;
            $json = json_encode($json);

            file_put_contents($path, $json);
        }
    }


}
