<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        return view('layouts.admin');
    }
}
