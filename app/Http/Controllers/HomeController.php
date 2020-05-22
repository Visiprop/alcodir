<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Absency;
use App\LinkedinConnect;

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

        $linkedinConnects = LinkedinConnect::all();
        $rendyLC = LinkedinConnect::where('user_id','2')->count();
        $saehuLC = LinkedinConnect::where('user_id','3')->count();
        $suleLC = LinkedinConnect::where('user_id','4')->count();

        return view('pages.dashboard',compact('absency','rendyLC','saehuLC','suleLC'));
        // return view('/home');
    }

}
