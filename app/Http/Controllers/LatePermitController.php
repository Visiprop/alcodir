<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LatePermit;

class LatePermitController extends Controller
{
    //
    public function index()
    {                      
        return view('pages.latePermit');
    }

    public function submit(Request $req)
    {        
                
        if(Auth::check()) {

            $date = $req->date." ".$req->time;

            $data = [
                'user_id'       => Auth::getUser()->id,
                'reason'       => $req->reason,
                'date'       => $date,                
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $latePermit = LatePermit::create($data);

            return redirect()->route('latepermit');
        }
    }

}
