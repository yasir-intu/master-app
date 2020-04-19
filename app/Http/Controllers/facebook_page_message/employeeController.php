<?php

namespace App\Http\Controllers\facebook_page_message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\assign_facebook_message;

class employeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        $this->middleware('only_employee');
    }

    public function index(){

        $fb = new \Facebook\Facebook;
        
        try {
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 0)->get() as $id){ 
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $mess=assign_facebook_message::all();

        return view('admin.facebook page messages.employee-all-messages', compact('fb', 'response', 'mess'));
    }
    
    public function progressive(){

        $fb = new \Facebook\Facebook;
        try {
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 1)->get() as $id){
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $mess=assign_facebook_message::all();

        return view('admin.facebook page messages.employee-all-messages', compact('fb', 'response', 'mess'));
    }
	
	public function complete(){

        $fb = new \Facebook\Facebook;
        
        
        try {
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 0)->where('complete', '!=', 0)->get() as $id){
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $mess=assign_facebook_message::all();

        return view('admin.facebook page messages.employee-all-messages', compact('fb', 'response', 'mess'));
    }
	
	public function view($id, $unread){
        $mess=Auth::user()->employee->message()->where('mess_id', $id)->firstOrFail();
        
        $fb = new \Facebook\Facebook;
    
    try {
        if($mess){
            if($unread>25){
                
            $response = $fb->get(
                '/'.$mess->mess_id.'?fields=senders,messages.limit('.$unread.'){message,attachments.limit('.$unread.'){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit('.$unread.'){description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
            
            }else{
                
            $response = $fb->get(
                '/'.$mess->mess_id.'?fields=senders,messages{message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags},unread_count,message_count,id',
                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
            );
            
            }
        }else{
            return redirect()->back();
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
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 0)->get() as $id){ 
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $f=array();
        foreach($response as $response){
            array_push($f, $response->getDecodedBody());
        }

    return view('admin.facebook page messages.view-messages', compact('paging', 'a', 'fb', 'f', 'graphNode', 'b'));
}

public function view_next($id, $unread, $after){
    $mess=Auth::user()->employee->message->where('mess_id', $id)->find(1);
		
    $fb = new \Facebook\Facebook;

    try {	
        if($mess){
        $response = $fb->get(
            '/'.$mess->mess_id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&after='.$after.'&limit=25&pretty=0',
            'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
        );
        }else{
                return redirect()->back();
        } 
        
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
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 0)->get() as $id){ 
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $f=array();
        foreach($response as $response){
            array_push($f, $response->getDecodedBody());
        }

    return view('admin.facebook page messages.view-messages', compact('paging', 'a', 'fb', 'f', 'graphNode', 'b'));
}

public function view_prev($id, $unread, $before){
    $mess=Auth::user()->employee->message->where('mess_id', $id)->find(1);
    
    $fb = new \Facebook\Facebook;

    try {	
        if($mess){
        
        $response = $fb->get(
            '/'.$mess->mess_id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&before='.$before.'&limit=25&pretty=0',
            'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
        );
    }else{
        return redirect()->back();
    }
        
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
			$response=array();
			foreach(Auth::user()->employee->message()->where('progressive', 0)->get() as $id){ 
			if(!empty($id)){
				array_push($response, $fb->get(
					'/'.$id->mess_id.'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id',
					'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
				));
			}else{
				$response=null;
			}
			}
        } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $f=array();
        foreach($response as $response){
            array_push($f, $response->getDecodedBody());
        }

    return view('admin.facebook page messages.view-messages', compact('paging', 'a', 'fb', 'f', 'graphNode', 'b'));
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
            }
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

public function assain_progressive(Request $request){
		$id= $request->input('mess_id');
		$this->validate($request,[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		$ass= assign_facebook_message::whereIn("mess_id", $id)->update([
			'progressive'=>'1',
			'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($ass) {
            Session::flash('success_progressive','value');
            return redirect('admin/employee/client-message/progressive');    
        }else{
            Session::flash('error_progressive','value');
            return redirect()->back();
        }
	}
	
	public function assain_complete(Request $request){
		$id= $request->input('mess_id');
		$this->validate($request,[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		$ass=array();
		$get= assign_facebook_message::whereIn("mess_id", $id)->get();
		foreach($get as $gets){
		$com=$gets->complete+1;    
		$up= assign_facebook_message::where("mess_id", $gets->mess_id)->update([
			'complete'=>$com,
			'progressive'=>'0',
			'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        array_push($ass, $up);
		}
        if ($ass) {
            Session::flash('success_complete','value');
            return redirect('admin/employee/client-message/complete');    
        }else{
            Session::flash('error_complete','value');
            return redirect()->back();
        }
    }
	public function assain_reprogressive(Request $request){
		$id= $request->input('mess_id');
		$this->validate($request,[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		$ass=array();
		$get= assign_facebook_message::whereIn("mess_id", $id)->get();
		foreach($get as $gets){
		    if($gets->complete>0){
		        $com=$gets->complete-1;   
		    }else{
		        $com=0;
		    }
		$up= assign_facebook_message::where("mess_id", $gets->mess_id)->update([
			'complete'=>$com,
			'progressive'=>'1',
			'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        array_push($ass, $up);
		}
        if ($ass) {
            Session::flash('success_progressive','value');
            return redirect('admin/employee/client-message/progressive');    
        }else{
            Session::flash('error_progressive','value');
            return redirect()->back();
        }
    }
}
