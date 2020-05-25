<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPointRequest extends Model
{
    //
    protected $fillable = [
        'sldr_user_id',
        'mgm_user_id',
        'reason',
        'point',
        'status',        
        'created_at',       
    ];

    public function soldier()
	{
		return $this->belongsTo('App\User' , 'sldr_user_id', 'id');
    }

    public function requester()
	{
		return $this->belongsTo('App\User' , 'mgm_user_id', 'id');
    }


}
