<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absency extends Model
{
    //
    protected $fillable = [
        'user_id',
        'status',       
        'created_at',       
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
}
