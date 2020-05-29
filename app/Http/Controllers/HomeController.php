<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Absency;
use App\LinkedinConnect;

class HomeController extends Controller
{
    


    public function index()
    {        
        Auth::check();         
        $myAbsency = Absency::whereDate('created_at', '=', date('Y-m-d'))->where('user_id', Auth::getUser()->id)->first();
        $todayAbsencies = Absency::whereDate('created_at', '=', date('Y-m-d'))->get();
        $linkedinConnects = LinkedinConnect::all();
        $rendyLC = LinkedinConnect::where('user_id','2')->count();
        $syaekhuLC = LinkedinConnect::where('user_id','3')->count();
        $suleLC = LinkedinConnect::where('user_id','4')->count();

        return view('pages.dashboard',compact('todayAbsencies','myAbsency','rendyLC','syaekhuLC','suleLC'));
        
    }

}
