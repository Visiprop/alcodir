<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    //
    protected $fillable = [
        'user_id',
        'mood_id',       
        'fact',
        'advice',       
        'review',
        'status',
        'created_at',       
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
    }

    public function mood()
	{
		return $this->belongsTo('App\Mood');
    }
}
