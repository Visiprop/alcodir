<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public function absency()
	{
		return $this->hasMany('App\Absency');
    }
    public function linkedinConnect()
	{
		return $this->hasMany('App\LinkedinConnect');
    }

    public function vpointRequest()
	{
		return $this->hasMany('App\VPointRequest');
    }

    public function dailyReport()
	{
		return $this->hasMany('App\DailyReport');
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_users');
    }

    
    /***
     * @param $role
     * @return mixed
     */
    public function hasRole($role_id)
    {
        
        $user = User::where('id', '=', $this->id )->whereHas('roles', function ($query) use($role_id){
            $query->where('role_id', '=', $role_id);
        })->first();     

        if($user)
            return true;

        return false;
    }

    
}
