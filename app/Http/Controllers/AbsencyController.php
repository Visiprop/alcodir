<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Absency;

class AbsencyController extends Controller
{
    //
    public function submit()
    {        
        
        if(Auth::check()) {

            $dt = Carbon::parse();
                        
            //Check Late
            if($dt->hour >= 10)
                $status = 1;
            else
                $status = 0;

            $data = [
                'user_id'       => Auth::getUser()->id,                
                'status'    => $status,
                'created_at' => date('Y-m-d H:i:s')
            ]; 
            
            $absency = Absency::create($data);
            
            return redirect()->route('dashboard');
        }
    }
}
