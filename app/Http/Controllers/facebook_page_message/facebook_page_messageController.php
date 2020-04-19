<?php

namespace App\Http\Controllers\facebook_page_message;

use App\assign_facebook_message;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Senior_Executive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;
use Illuminate\Support\Facades\Validator;

class facebook_page_messageController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        $this->middleware('director');
    }

	/* used for angularjs*/
	
    public function index(){
        return view('layouts.admin');
    }
	
	public function assigning(){
		$a=array();
        if (Auth::user()->role_id == 1) {
            $se=Senior_Executive::orderBy('dep_id', 'DESC')->get();
            $e=Employee::orderBy('dep_id', 'DESC')->get();
        }else {
            $se=Auth::user()->director->executive;
            $e=Auth::user()->director->employee;
        }
		
		array_push($a, $se, $e);
		return $a;
    }
	
	public function assigning1(){
		
		return assign_facebook_message::with('director', 'executive','employee')->get();
		
    }
	
	/* used for angularjs*/
	
	public function view($id, $unread){
		
			$fb = new \Facebook\Facebook;
        
        try {
			if($unread>25){
				
            $response = $fb->get(
                '/'.$id.'?fields=senders,messages.limit('.$unread.'){message,attachments.limit('.$unread.'){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit('.$unread.'){description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
			
			}else{
				
			$response = $fb->get(
                '/'.$id.'?fields=senders,messages{message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
			
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode = $response->getDecodedBody();
        //dd($graphNode);
        $paging = $graphNode["messages"]["paging"];
        
        $a= $graphNode["messages"]["data"];

        try {
            $response = $fb->get(
                '/'.$graphNode["senders"]["data"][0]["id"],
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    
        $graphNode3 = json_decode($response->getGraphNode(), true);
        
        $b= $graphNode3;

        try {
            $response = $fb->get(
                '/me?fields=conversations.limit(10){senders,unread_count,id}',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode2 = $response->getDecodedBody();
        $paging2 = $graphNode2["conversations"]["paging"];
        
        $f= $graphNode2["conversations"]["data"];

        return view('admin.facebook page messages.view-messages', compact('paging', 'paging2', 'a', 'fb', 'f', 'graphNode', 'b'));
    }

    public function view_before($id, $unread, $before){
		
        $fb = new \Facebook\Facebook;
    
        try {

            $response = $fb->get(
                '/'.$id.'?fields=senders,messages{message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );

        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode = $response->getDecodedBody();

        $paging = $graphNode["messages"]["paging"];
        
        $a= $graphNode["messages"]["data"];

        try {
            $response = $fb->get(
                '/'.$graphNode["senders"]["data"][0]["id"],
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    
        $graphNode3 = json_decode($response->getGraphNode(), true);
        
        $b= $graphNode3;

        try {
            $response = $fb->get(
                '2432634986968282/conversations?fields=senders,unread_count,id&pretty=0&limit=10&before='.$before,
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode2 = $response->getDecodedBody();

        $paging2 = $graphNode2["paging"];
        
        $f= $graphNode2["data"];

        return view('admin.facebook page messages.view-messages', compact('paging', 'paging2', 'a', 'fb', 'f', 'graphNode', 'b'));
    }

    public function view_after($id, $unread, $after){
		
        $fb = new \Facebook\Facebook;
    
        try {
              
            $response = $fb->get(
                '/'.$id.'?fields=senders,messages{message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
            
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode = $response->getDecodedBody();

        $paging = $graphNode["messages"]["paging"];
        
        $a= $graphNode["messages"]["data"];

        try {
            $response = $fb->get(
                '/'.$graphNode["senders"]["data"][0]["id"],
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    
        $graphNode3 = json_decode($response->getGraphNode(), true);
        
        $b= $graphNode3;

        try {
            $response = $fb->get(
                '2432634986968282/conversations?fields=senders,unread_count,id&pretty=0&limit=10&after='.$after,
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode2= $response->getDecodedBody();
        
        $paging2 = $graphNode2["paging"];
        
        $f= $graphNode2["data"];

        return view('admin.facebook page messages.view-messages', compact('paging', 'paging2', 'a', 'fb', 'f', 'graphNode', 'b'));
    }

    public function view_next($id, $unread, $after){
		
        $fb = new \Facebook\Facebook;
    
        try {	
            
			$response = $fb->get(
                '/'.$id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&after='.$after.'&limit=25&pretty=0',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
			
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode1 = $response->getDecodedBody();
        //dd($graphNode1);
        $paging = $graphNode1["paging"];
        
        $a= $graphNode1["data"];

        try {
				
			$response = $fb->get(
                '/'.$id.'?fields=senders,unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );

        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode = $response->getDecodedBody();

        try {
            $response = $fb->get(
                '/'.$graphNode["senders"]["data"][0]["id"],
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    
        $graphNode3 = json_decode($response->getGraphNode(), true);
        
        $b= $graphNode3;

        try {
            $response = $fb->get(
                '/me?fields=conversations.limit(10){senders,unread_count,id}',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode2 = $response->getDecodedBody();
        $paging2 = $graphNode2["conversations"]["paging"];
        
        $f= $graphNode2["conversations"]["data"];

        return view('admin.facebook page messages.view-messages', compact('paging', 'paging2', 'a', 'fb', 'f', 'graphNode', 'b'));
    }

    public function view_prev($id, $unread, $before){
		
        $fb = new \Facebook\Facebook;
    
        try {	
            
			$response = $fb->get(
                '/'.$id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&before='.$before.'&limit=25&pretty=0',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
			
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode1 = $response->getDecodedBody();
        //dd($graphNode);
        $paging = $graphNode1["paging"];
        
        $a= $graphNode1["data"];

        try {
				
			$response = $fb->get(
                '/'.$id.'?fields=senders,unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );

        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode = $response->getDecodedBody();

        try {
            $response = $fb->get(
                '/'.$graphNode["senders"]["data"][0]["id"],
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    
        $graphNode3 = json_decode($response->getGraphNode(), true);
        
        $b= $graphNode3;

        try {
            $response = $fb->get(
                '/me?fields=conversations.limit(10){senders,unread_count,id}',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        $graphNode2 = $response->getDecodedBody();
        $paging2 = $graphNode2["conversations"]["paging"];
        
        $f= $graphNode2["conversations"]["data"];

        return view('admin.facebook page messages.view-messages', compact('paging', 'paging2', 'a', 'fb', 'f', 'graphNode', 'b'));
    }

    public function send_message($id, $unread, $sender, Request $request){
        //dd($x=count($request->file('attach')));

        if (empty($request->input('text_message'))) {
            $mess=null;
        }else{
            $mess=$request->input('text_message');
        }
        if (!empty($request->file('attach'))) {
            foreach($request->file('attach') as $img){
                
                if ($request->hasFile('attach')) {
                    $image=$img;
                    $imgName='messsage'.uniqid(2021).'_'.time().'_'.uniqid(21).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(600,400)->save('uploads/fb-message-attach/'.$imgName);
                }+
                //dd(public_path('uploads/users/').$imgName);
                //dd(asset('uploads/users/'.$imgName));
                $response = [
                    "recipient" => [
                        "id" => $sender
                    ],
                        
                    "message" => [
                        "attachment"=>[
                            "type"=>"image", 
                            "payload"=>[
                              "url"=>asset('uploads/users/'.$imgName), 
                              "is_reusable"=>true
                            ]
                        ],
                    ]
                ];

                    $ch = curl_init("https://graph.facebook.com/v6.0/me/messages?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD");

                    // set URL and other appropriate options
                    //curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

                    // grab URL and pass it to the browser
                    curl_exec($ch);

                    // close cURL resource, and free up system resources
                    curl_close($ch);
                    
                    unlink(public_path('uploads/users/').$imgName);
            }
            if (!empty($request->input('text_message'))) {
                $response = [
                    "recipient" => [
                        "id" => $sender
                    ],
                        
                    "message" => [
                        "text" => $mess
                       ]
                    ];
    
                    $ch = curl_init("https://graph.facebook.com/v6.0/me/messages?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD");
    
                    // set URL and other appropriate options
                    //curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
                    // grab URL and pass it to the browser
                    curl_exec($ch);
    
                    // close cURL resource, and free up system resources
                    curl_close($ch);
            }
        } else {
            $response = [
                "recipient" => [
                    "id" => $sender
                ],
                    
                "message" => [
                    "text" => $mess
                   ]
                ];

                $ch = curl_init("https://graph.facebook.com/v6.0/me/messages?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD");

                // set URL and other appropriate options
                //curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

                // grab URL and pass it to the browser
                curl_exec($ch);

                // close cURL resource, and free up system resources
                curl_close($ch);
        }

        return redirect()->back();
    }

	
	public function multi_assign(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
        ]);
		
		if($validator->fails()){
			$errors = $validator->errors()->all();
            return response()->json(['errors' => $errors, 'status' => 400], 400);
		}

        if (empty($request->input('multi_e')) && empty($request->input('multi_se')) || empty($request->input('multi_se'))) {
        
            $validator = Validator::make($request->all(),[
                'multi_se'=>'required',
            ],[
                'multi_se.required'=>'Please Enter a Senior Executive',
            ]);
			
			if($validator->fails()){
				$errors = $validator->errors()->all();
				return response()->json(['errors' => $errors, 'status' => 400], 400);
			}
            
        }
        $id= $request->input('mess_id');
        $ass= assign_facebook_message::whereIn("mess_id", $id)->get();

        if (Auth::user()->role_id==1) {
            $md=Senior_Executive::where('id', $request->input('multi_se'))->firstOrFail();
            $md=$md->director->id;
        }else{
            $md=Auth::user()->director->id;
        }

        if (empty($request->input('multi_e'))) {
        
            if(!empty($ass)){
                foreach($id as $key => $ids){
                    if(in_array($ids, json_decode(json_encode($ass), true))){
                        $update= assign_facebook_message::where("mess_id", $ids)->update([
                            'md_id'=>$md,
                            'se_id'=>$request->input('multi_se'),
                            'updated_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                    }else{
                            $insert= assign_facebook_message::insert([
                                'mess_id'=>$ids,
                                'md_id'=>$md,
                                'se_id'=>$request->input('multi_se'),
                                'created_at'=>Carbon::now()->toDateTimeString(),
                            ]);
                    }
                    if($key === array_key_last($id)){
                        return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
                    }
                }
            }else{
                foreach($id as $ids){
                    $insert= assign_facebook_message::insert([
                        'mess_id'=>$ids,
                        'md_id'=>$md,
                        'se_id'=>$request->input('multi_se'),
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                
                }
                if ($insert) {
                    return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
                }else{
                    return response(['errors' => ['upload error'], 'success' => [], 'status' => 200], 200);
                }
            }
        }else{
            if(!empty($ass)){
                foreach($id as $key => $ids){
                    if(in_array($ids, json_decode(json_encode($ass), true))){
                        $update= assign_facebook_message::where("mess_id", $ids)->update([
                            'md_id'=>$md,
                            'se_id'=>$request->input('multi_se'),
                            'e_id'=>$request->input('multi_e'),
                            'updated_at'=>Carbon::now()->toDateTimeString(),
                        ]);
                    }else{
                            $insert= assign_facebook_message::insert([
                                'mess_id'=>$ids,
                                'md_id'=>$md,
                                'se_id'=>$request->input('multi_se'),
                                'e_id'=>$request->input('multi_e'),
                                'created_at'=>Carbon::now()->toDateTimeString(),
                            ]);
                    }
                    if($key === array_key_last($id)){
                        return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
                    }
                }
            }else{
                foreach($id as $ids){
                    $insert= assign_facebook_message::insert([
                        'mess_id'=>$ids,
                        'md_id'=>$md,
                        'se_id'=>$request->input('multi_se'),
                        'e_id'=>$request->input('multi_e'),
                        'created_at'=>Carbon::now()->toDateTimeString(),
                    ]);
                
                }
                if ($insert) {
                    return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
                }else{
				return response(['errors' => ['upload error'], 'success' => [],'status' => 200], 200);
                }
            }
        }
	}
}
