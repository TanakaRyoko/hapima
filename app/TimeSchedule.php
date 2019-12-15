<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSchedule extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
        'content' => 'required'
        );
}