<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brainstroming extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',        
        'status',
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
}
