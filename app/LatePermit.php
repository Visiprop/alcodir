<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatePermit extends Model
{
    //
    protected $fillable = [
        'user_id',
        'reason',       
        'date',
        'status',       
        
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
}
