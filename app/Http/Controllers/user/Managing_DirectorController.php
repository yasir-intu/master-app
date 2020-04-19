<?php

namespace App\Http\Controllers\user;

use App\Employee;
use App\Employment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Senior_Executive;

use function GuzzleHttp\json_decode;

class Managing_DirectorController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function executive(){
        $all=Senior_Executive::where('md_id', Auth::user()->director->id)->orderBy('dep_id', 'DESC')->get();
        return view('admin.user.md-all-senior', compact('all'));
    }

    public function employee(){
        $se=Senior_Executive::where('md_id', Auth::user()->director->id)->orderBy('dep_id', 'DESC')->get();
        $all=Employee::where('md_id', Auth::user()->director->id)->orderBy('dep_id', 'DESC')->get();
        $em=Employment::all();
        return view('admin.user.md-all-employee', compact('all', 'se', 'em'));
    }
}
