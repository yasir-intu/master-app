<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response,File;

use Socialite;

use App\User;

use Auth;

use carbon\carbon;

use pimax\fbBotApp;
use pimax\Messages\Message;

class SocialController extends Controller{

    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
   
      $getInfo = Socialite::driver($provider)->user();
      $user = $this->createUser($getInfo,$provider); 
      Auth::login($user, true); 
      return redirect()->to('/admin');
    }
   
    public function createUser($getInfo,$provider){
    
       $user = User::where('provider_id', $getInfo->id)->orWhere('email', $getInfo->email)->first();
       if (!$user) {
           $user = User::create([
               'name'     => $getInfo->name,
               'email'    => $getInfo->email,
               'provider' => $provider,
               'provider_id' => $getInfo->id,
               'photo' => $getInfo->avatar_original,
               'email_verified_at' => Carbon::now()->toDateTimeString(),
               
           ]);
       }
       return $user;
    }
    
    public function message(Request $request){
        
        //dd($data= $request->all());
        //dd($data = json_decode(file_get_contents('php://input'),true));
        $data= $request->all();

        $id=$data["entry"][0]["messaging"][0]["sender"]["id"];
        $message=$data["entry"][0]["messaging"][0]["message"];

        if (!empty($message)) {
            $message="hi from master design";
            $this->sendmessage($id, $message);
        }
        
        
        

    }

    protected function sendmessage($id, $message){

        $response=[
            'recipient' => [
                'id' => $id
            ],
            'message' => [
                'text' => $message
            ]
        ];

        $ch = curl_init("https://graph.facebook.com/v6.0/me/messages?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD");

        // set URL and other appropriate options
        //curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));

        // grab URL and pass it to the browser
        curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

    }
}
