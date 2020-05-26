<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\DailyReport;

class DailyReportController extends Controller
{

    
    public function index()
    {      
                        
        Auth::check();   
        $myDailyReport = DailyReport::whereDate('created_at', '=', date('Y-m-d'))->where('user_id', Auth::getUser()->id)->first();              
        $dailyReports = DailyReport::all();
        return view('pages.dailyReport', compact('dailyReports','myDailyReport'));
        
    }

    public function submit(Request $req)
    {        
        // dd($req);

        $dt = Carbon::parse();
                        
        //Check Late
        if($dt->hour >= 19)
            $status = 1;
        else
            $status = 0;


        if(Auth::check()) {
            $data = [
                'user_id'       => Auth::getUser()->id,
                'mood_id'       => 0,                
                'fact'       => $req->fact,
                'advice'       => $req->advice,                
                'status'       => $status,                
                'created_at' => date('Y-m-d H:i:s')                
            ]; 

            $dailyReport = DailyReport::create($data);

            return redirect()->route('dailyreport');
        }
    }

    
}
