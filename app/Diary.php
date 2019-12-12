<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'date' => 'required',
        'content' => 'required',
    );
    
    
    public function histories()
    {
        return $this->hasMany('App\History');
    }

}
