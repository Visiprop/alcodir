<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedinConnect extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'position',
        'company',
        'url',
        'gender',
        'created_at',       
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
    }
}
