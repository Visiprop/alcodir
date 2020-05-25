<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\VPointRequest;
use App\User;

class VPointRequestController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {      
        Auth::check();  
                        
        $soldiers = User::all();
        $vpointRequests = VPointRequest::all();
        return view('pages.managements.vpoint', compact('soldiers','vpointRequests'));
    }

    public function submit(Request $req)
    {        
        // dd($req);
        if(Auth::check()) {
            $data = [
                'sldr_user_id'       => $req->soldier_id,
                'mgm_user_id'       => Auth::getUser()->id,
                'reason'       => $req->reason,
                'point'       => $req->point,                                
                'status'       => 0,                                
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $vpointRequest = VPointRequest::create($data);

            return redirect()->route('management.vpoint');
        }
    }
}
