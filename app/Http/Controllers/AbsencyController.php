<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Absency;

class AbsencyController extends Controller
{
    //
    public function submit()
    {        
        
        if(Auth::check()) {
            $data = [
                'user_id'       => Auth::getUser()->id,
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $absency = Absency::create($data);

            return redirect()->route('linkedin');
        }
    }
}
