<?php

namespace App\Http\Controllers\user;

use App\Author;
use App\Department;
use App\Editor;
use App\Employee;
use App\Employment;
use App\Http\Controllers\Controller;
use App\Managing_Director;
use App\role;
use App\Senior_Executive;
use App\SuperAdmin;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function add(){
        
        $role= role::where('role_id', '!=', 7)->get();
        $dep= Department::all();
        $md= Managing_Director::all();
        $se= Senior_Executive::all();
        $em= Employment::all();
        return view('admin.user.add-user', compact('role', 'dep', 'md', 'se', 'em'));
    }
    
    public function profile(){
        if (Auth::user()->role_id == 1) {
            $view= SuperAdmin::where('user_id', Auth::user()->id)->firstOrFail();
        }elseif (Auth::user()->role_id == 2) {
            $view= Managing_Director::where('user_id', Auth::user()->id)->firstOrFail();
        }elseif (Auth::user()->role_id == 3) {
            $view= Senior_Executive::where('user_id', Auth::user()->id)->firstOrFail();
        }elseif (Auth::user()->role_id == 4) {
            $view= Employee::where('user_id', Auth::user()->id)->firstOrFail();
        }elseif (Auth::user()->role_id == 5) {
            $view= Author::where('user_id', Auth::user()->id)->firstOrFail();
        }elseif (Auth::user()->role_id == 6) {
            $view= Editor::where('user_id', Auth::user()->id)->firstOrFail();
        }
        return view('admin.user.profile', compact('view'));
    }

    public function submit(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'user_name'=>'required|unique:users',
            'password'=>'required|string|min:8|max:40|confirmed',
            'role'=>'required',
            'phone'=>'required',
            'profile_avatar'=>'required',
            'address1'=>'required',
        ],[
            'name.required'=>'Please Enter a Name',
            'email.required'=>'Please Enter Email',
            'email.email'=> 'please Enter a Valid Email',
            'email.unique'=> 'This Email Has Already Taken',
            'role.required'=>'Please Select Role Id',
            'password.required'=>'Please Enter Password',
            'password.confirmed'=>'Password Does Not Match',
            'password.string'=>'Password Must be String',
            'password.min'=>'Password Must be Minimum 8 Character',
            'password.max'=>'Password Should Not be More Than 40 Character',
            'user_name.required'=> 'Please Enter a User Name',
            'user_name.unique'=> 'This User Name Has Already Taken',
            'profile_avatar.required'=> 'Please Give a Pic of You',
            'address1.required'=> 'please Enter Your Present Address',
            'phone.required'=> 'please Enter Your Mobile Number',
        ]);
        

        if ($request->input('role')==2||$request->input('role')==3||$request->input('role')==4) {
            $this->validate($request,[
                'department'=>'required',
            ],[
                'department.required'=>'Please Enter Your Department',
            ]);
        }
        
        
        if ($request->input('role')==3||$request->input('role')==4) {
            $this->validate($request,[
                'director'=>'required',
            ],[
                'director.required'=>'Please Enter Your Managing Director Name',
            ]);
        }
        
        
        if ($request->input('role')==4) {
            $this->validate($request,[
                'executive'=>'required',
                'employment'=>'required',
            ],[
                'executive.required'=>'Please Enter Your Senior Executive Name',
                'employment.required'=>'Please Enter Your Employment Type',
            ]);
        }
        
        
        $slug='USER_'.uniqid(2019);
        $creator=Auth::user()->id;

        if ($request->hasFile('profile_avatar')) {
            $image=$request->file('profile_avatar');
            $imgName='USER_'.uniqid(2019).'_'.time().'_'.uniqid(19).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('uploads/users/'.$imgName);
        }

        $insert=User::insertGetId([
            'user_name'=>$_POST['user_name'],
            'email'=>$_POST['email'],
            'password'=>Hash::make($_POST['password']),
            'role_id'=>$_POST['role'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if (!empty($request->input('address2'))) {
            $add=$_POST['address2'];
        }else{
            $add=null;
        }
        if (!empty($request->input('city'))) {
            $city=$_POST['city'];
        }else{
            $city=null;
        }
        if (!empty($request->input('zip'))) {
            $zip=$_POST['zip'];
        }else{
            $zip=null;
        }

        if ($request->input('role')==1) {
            $sa=SuperAdmin::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->input('role')==2) {
            $md=Managing_Director::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'dep_id'=>$_POST['department'],
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->input('role')==3) {
            $se=Senior_Executive::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'dep_id'=>$_POST['department'],
                'md_id'=>$_POST['director'],
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->input('role')==4) {
            $em=Employee::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'dep_id'=>$_POST['department'],
                'md_id'=>$_POST['director'],
                'se_id'=>$_POST['executive'],
                'em_id'=>$_POST['employment'],
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->input('role')==5) {
            $au=Author::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->input('role')==6) {
            $ed=Editor::insert([
                'name'=>$_POST['name'],
                'photo'=>$imgName,
                'mobile'=>$_POST['phone'],
                'address1'=>$_POST['address1'],
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'user_id'=>$insert,
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            if ($request->input('role')==1) {
                if ($sa) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
            if ($request->input('role')==2) {
                if ($md) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
            if ($request->input('role')==3) {
                if ($se) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
            if ($request->input('role')==4) {
                if ($em) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
            if ($request->input('role')==5) {
                if ($au) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
            if ($request->input('role')==6) {
                if ($ed) {
                    Session::flash('success_user_insert','value');
                    return redirect('admin/user/add');    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect('admin/user/add');
                }
            }
        } else {
            Session::flash('error_user_insert','value');
            return redirect('admin/user/add');
        }

    }

public function profile_update(Request $request, $id, $email, $slug, $user, $role){
        $this->validate($request,[
            'name'=>'required',
            'add1'=>'required',
            'phone'=>'required',
        ],[
            'name.required'=>'Please Enter a Name',
            'add1.required'=> 'please Enter Your Present Address',
            'phone.required'=> 'please Enter Your Mobile Number',
        ]);

        if ($request->input('email')!==$email || empty($request->input('email'))) {
            $this->validate($request,[
                'email'=>'required|email|unique:users',
            ],[
                'email.required'=>'Please Enter Email',
                'email.email'=> 'please Enter a Valid Email',
                'email.unique'=> 'This Email Has Already Taken',
            ]);
        }
        
        if ($request->input('user_name')!==$user || empty($request->input('user_name'))) {
        $this->validate($request,[
            'user_name'=>'required|unique:users',
        ],[
            'user_name.required'=> 'Please Enter a User Name',
            'user_name.unique'=> 'This User Name Has Already Taken',
        ]);
        }

        if ($request->input('new_pass')!==null) {

        $this->validate($request,[
            'new_pass'=>'min:8|max:40|confirmed',
        ],[
            'new_pass.confirmed'=>'Password Does Not Match',
            'new_pass.min'=>'Password Must be Minimum 8 Character',
            'new_pass.max'=>'Password Should Not be More Than 40 Character',
        ]);

        }
        //dd($request->all());
        

        if (!empty($request->input('add2'))) {
            $add=$_POST['add2'];
        }else{
            $add=null;
        }
        if (!empty($request->input('city'))) {
            $city=$_POST['city'];
        }else{
            $city=null;
        }
        if (!empty($request->input('zip'))) {
            $zip=$_POST['zip'];
        }else{
            $zip=null;
        }

        $pass=User::where('id', $id)->firstOrfail()->password;
        //dd($pass);
        if(Hash::check($request->input('old_pass'), $pass)){
            $pass=$request->input('new_pass');
            dd($pass);
        }

        $update=User::where('id', $id)->update([
            'user_name'=>$request->input('user_name'),
            'email'=>$request->input('email'),
            'password'=> $pass,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($role==1) {
            $sa=SuperAdmin::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($role==2) {
            $md=Managing_Director::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($role==3) {
            $se=Senior_Executive::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($role==4) {
            $em=Employee::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($role==5) {
            $au=Author::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($role==6) {
            $ed=Editor::where('slug', $slug)->update([
                'name'=>$request->input('name'),
                'mobile'=>$request->input('phone'),
                'address1'=>$request->input('add1'),
                'address2'=>$add,
                'city'=>$city,
                'zip'=>$zip,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            if ($role==1) {
                if ($sa) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
            if ($role==2) {
                if ($md) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
            if ($role==3) {
                if ($se) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
            if ($role==4) {
                if ($em) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
            if ($role==5) {
                if ($au) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
            if ($role==6) {
                if ($ed) {
                    Session::flash('success_user_insert','value');
                    return redirect()->back();    
                }else{
                    Session::flash('error_user_insert','value');
                    return redirect()->back();
                }
            }
        } else {
            Session::flash('error_user_insert','value');
            return redirect()->back();
        }

    }
}
