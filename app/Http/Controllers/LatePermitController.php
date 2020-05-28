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
        $latePermits = LatePermit::where('user_id', Auth::getUser()->id)->get();          
        return view('pages.latePermit', compact('latePermits'));
    }

    public function indexAll()
    {            
        $latePermits = LatePermit::all();          
        return view('pages.managements.dashboardLatePermit', compact('latePermits'));
    }

    public function submit(Request $req)
    {        
                
        if(Auth::check()) {

            $date = $req->date." ".$req->time;

            $data = [
                'user_id'       => Auth::getUser()->id,
                'reason'       => $req->reason,
                'date'       => $date,                
                'status'       => 0,  
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $latePermit = LatePermit::create($data);

            return redirect()->route('latepermit');
        }
    }

    public function action(Request $req)
    {   
        // dd($status);                     
        // dd($id);

        if(Auth::check()) {

            $latePermit = LatePermit::where('id', '=', $req->id)->first();          
            $data = [
                'status' => $req->status,                        
            ];        

            $latePermit->update($data);

            return redirect()->route('management.latepermit.dashboard');
        }
    }

}
