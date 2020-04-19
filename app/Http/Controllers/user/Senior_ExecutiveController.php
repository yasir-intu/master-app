<?php

namespace App\Http\Controllers\user;

use App\Employee;
use App\Employment;
use App\Http\Controllers\Controller;
use App\Senior_Executive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Senior_ExecutiveController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function employee(){
        $all=Employee::where('se_id', Auth::user()->executive->id)->orderBy('dep_id', 'DESC')->get();
        $em=Employment::all();
        return view('admin.user.senior-all-employee', compact('all', 'em'));
    }
}
