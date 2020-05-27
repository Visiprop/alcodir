<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function index()
    {
        return view('auth.login');
    }
    
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            // Authentication fail...
            
            return Redirect::back();
        }

        // Authentication pass...
        return redirect()->intended();            
        
        
    }


    public function logout()
    {
        // dd();
        Auth::logout();        
        return redirect()->route('dashboard');
           
    }

}
