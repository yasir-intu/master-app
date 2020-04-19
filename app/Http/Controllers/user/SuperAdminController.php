<?php

namespace App\Http\Controllers\user;

use App\Author;
use App\Department;
use App\Editor;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Managing_Director;
use App\Senior_Executive;
use App\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
        $this->middleware('superadmin');
    }

    public function super_admin(){
        $all=SuperAdmin::all();
        return view('admin.user.all-user', compact('all'));
    }

    public function director(){
        $all=Managing_Director::orderBy('dep_id', 'DESC')->get();
        $deps=Department::orderBy('id', 'DESC')->get();
        return view('admin.user.all-dep-user', compact('all', 'deps'));
    }

    public function executive(){
        $all=Senior_Executive::orderBy('dep_id', 'DESC')->get();
        $deps=Department::orderBy('id', 'DESC')->get();
        return view('admin.user.all-dep-user', compact('all', 'deps'));
    }

    public function employee(){
        $all=Employee::orderBy('dep_id', 'DESC')->get();
        $deps=Department::orderBy('id', 'DESC')->get();
        return view('admin.user.all-dep-user', compact('all', 'deps'));
    }

    public function author(){
        $all=Author::all();
        return view('admin.user.all-user', compact('all'));
    }

    public function editor(){
        $all=Editor::all();
        return view('admin.user.all-user', compact('all'));
    }
}
