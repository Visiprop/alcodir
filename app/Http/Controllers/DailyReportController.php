<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\DailyReport;

class DailyReportController extends Controller
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
        $dailyReports = DailyReport::all();
        return view('pages.dailyReport', compact('dailyReports'));
        
    }

    
}
