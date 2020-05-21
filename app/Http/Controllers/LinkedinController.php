<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\LinkedinConnect;

class LinkedinController extends Controller
{
    //
    public function index()
    {      
        $dt = Carbon::parse();
        $today = $dt->today()->toDateString();
        
        Auth::check();         
        $linkedinConnects = LinkedinConnect::where('user_id', Auth::getUser()->id)->get();
        // $linkedinConnects = LinkedinConnect::all();
        return view('pages.linkedin', compact('linkedinConnects','today'));
    }

    public function submit(Request $req)
    {        
        // dd($req);
        if(Auth::check()) {
            $data = [
                'user_id'       => Auth::getUser()->id,
                'name'       => $req->name,
                'position'       => $req->position,
                'company'       => $req->company,
                'url'       => $req->url,
                'gender'       => $req->gender,
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $linkedin = LinkedinConnect::create($data);

            return redirect()->route('linkedin');
        }
    }
}
