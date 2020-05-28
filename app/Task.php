<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'daily_report_id',
        'value',
        'point',        
    ];

    public function dailyReport()
	{
		return $this->belongsTo('App\DailyReport');
    }
    
}
