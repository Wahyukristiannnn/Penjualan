<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	
    	$role = Auth::user()->role;
        if($role == "admin" || $role == "customer"){
            return view('dashboard');
        }  else {
            return redirect()->to('logout');
        }
        
    }
}
