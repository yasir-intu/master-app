<?php

namespace App\Http\Controllers\facebook_page_message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\assign_facebook_message;
use Illuminate\Support\Facades\Validator;

class senior_executiveController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        $this->middleware('only_executive');
    }

    public function index(){
		return view('layouts.admin');
    }
	public function ass(){
		return Auth::user()->executive->message()->with('employee')->get();
    }
	public function ass1($skip){
		return Auth::user()->executive->employee->skip($skip)->take(10);
    }
	
	public function view($id, $unread){

        $mess=Auth::user()->executive->message()->where('mess_id', $id)->firstOrFail();
		
        $fb = new \Facebook\Facebook;
    
    try {
        if($mess){
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
			foreach(Auth::user()->executive->message as $id){ 
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
    
    $mess=Auth::user()->executive->message()->where('mess_id', $id)->firstOrFail();
    
    $fb = new \Facebook\Facebook;

    try {	

        if($mess){
        
        $response = $fb->get(
            '/'.$id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&after='.$after.'&limit=25&pretty=0',
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
			foreach(Auth::user()->executive->message as $id){ 
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

    $mess=Auth::user()->executive->message()->where('mess_id', $id)->firstOrFail();
    
    $fb = new \Facebook\Facebook;

    try {	
        
        if($mess){

        $response = $fb->get(
            '/'.$id.'/messages?fields=message,attachments{image_data,file_url,video_data,size,mime_type,name},sticker,shares{description,link},created_time,from,to,tags&before='.$before.'&limit=25&pretty=0',
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
			foreach(Auth::user()->executive->message as $id){ 
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
	
	
	
	public function multi_assign(Request $request){
		$id= $request->input('mess_id');
		$validator = Validator::make($request->all(),[
            'mess_id'=>'required',
            'multi_md'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
			'multi_md.required'=>'Please Enter a Employee',
		]);
		
		if($validator->fails()){
			$errors = $validator->errors()->all();
            return response()->json(['errors' => $errors, 'status' => 400], 400);
		}
		
		$ass= assign_facebook_message::whereIn("mess_id", $id)->update([
			'e_id'=>$request->input('multi_md'),
			'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($ass) {
            return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
        }else{
			return response(['errors' => ['upload error'], 'success' => [],'status' => 200], 200);
        }
	}
	
	public function assain_progressive(Request $request){
		$id= $request->input('mess_id');
		$validator = Validator::make($request->all(),[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		
		if($validator->fails()){
			$errors = $validator->errors()->all();
            return response()->json(['errors' => $errors, 'status' => 400], 400);
		}
		
		$ass= assign_facebook_message::whereIn("mess_id", $id)->update([
			'progressive'=>'1',
			'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
		if ($ass) {
            return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
        }else{
			return response(['errors' => ['upload error'], 'success' => [],'status' => 200], 200);
        }
	}
	
	public function assain_complete(Request $request){
		$id= $request->input('mess_id');
		$validator = Validator::make($request->all(),[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		
		if($validator->fails()){
			$errors = $validator->errors()->all();
            return response()->json(['errors' => $errors, 'status' => 400], 400);
		}
		
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
            return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
        }else{
			return response(['errors' => ['upload error'], 'success' => [],'status' => 200], 200);
        }
	}
	
	public function assain_reprogressive(Request $request){
		$id= $request->input('mess_id');
		$validator = Validator::make($request->all(),[
            'mess_id'=>'required',
        ],[
            'mess_id.required'=>'Please select a Message',
		]);
		
		if($validator->fails()){
			$errors = $validator->errors()->all();
            return response()->json(['errors' => $errors, 'status' => 400], 400);
		}
		
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
            return response(['errors' => [], 'success' => ['upload success'], 'status' => 200], 200);
        }else{
			return response(['errors' => ['upload error'], 'success' => [],'status' => 200], 200);
        }
    }
}

