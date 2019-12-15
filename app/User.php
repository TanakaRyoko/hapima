<?php

namespace App;
// namespace App\Http\Controllers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_id','gender','prefecture','family_size',
        'working_days','commuting_time','partner_service_level',
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
    
    protected $guarded =array('id');
    
    
    
     public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'prefecture' => 'required',
        'family_size' => 'required',
        'working_days' => 'required',
        'commuting_time' => 'required',
        'partner_service_level' => 'required',
          
        );
}
