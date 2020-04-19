<?php

namespace App\Http\Controllers\user;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $all=Employee::all();
        return view('admin.user.employee-user', compact('all'));
    }
}
