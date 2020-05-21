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
            
            // dd($dt->today());
            // dd($absency->created_at->toDateString());
            //Check Late
            if($dt->hour > 10)
                $status = 'Late';
            else
                $status = 'On Time';

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
