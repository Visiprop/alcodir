<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Brainstroming;
use App\User;

class BrainstromingController extends Controller
{
    //
    public function index()
    {                              
        Auth::check();   
        $brainstromings = Brainstroming::all()->get();        
        $users = User::all();        
        return view('pages.superadmins.brainstroming', compact('brainstromings', 'users'));        
    }

    public function submit(Request $req)
    {        
        // dd($req);
        if(Auth::check()) {

            $date = $req->date." ".$req->time;

            $data = [
                'user_id'       => $req->speaker_id,
                'title'       => $req->title,
                'description'       => $req->description,
                'date'       => $date,                                
                'status'       => 0,        
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $brainstroming = Brainstroming::create($data);

            return redirect()->route('superadmin.brainstroming');
        }
    }
}
