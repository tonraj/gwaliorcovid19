<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\AuthorisedHelper;
use App\Store;
use App\Consumer;

class SMSNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
        //
        $this->type = $type;
        $this->message = $message;
    }

    public function handle()
    {
        

        if($this->type == "Officer"){
            $this->toOfficer();
        }
        if($this->type == "Consumer"){
            $this->toConsumer();
        }
        if($this->type == "Store"){
            $this->toStore();
        }


        
    }

    protected function toOfficer(){

        $all = AuthorisedHelper::all();

        foreach($all as $officer){

            $this->sendSMS($this->message, $officer->number);

        }

    }

    protected function toStore(){

        $all = Store::all();

        foreach($all as $store){

            $this->sendSMS($this->message, $store->phone_num);

        }

    }

    protected function toConsumer(){

        $all = Consumer::all();

        foreach($all as $consumer){

            $this->sendSMS($this->message, $consumer->phone);

        }

    }


    private function sendSMS($message, $number){


        $authKey = env('MSG91_KEY');

        $mobileNumber =  $number;

        $senderId = env('MSG91_SENDER_NAME');

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
