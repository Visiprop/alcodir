<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Absency;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        Auth::check();         
        $absency = Absency::whereDate('created_at', '=', date('Y-m-d'))->where('user_id', Auth::getUser()->id)->first();
        // return view('pages.dashboard',compact('absency'));
        return view('/home');
    }
}
