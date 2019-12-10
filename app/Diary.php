<?php

namespace はぴワーママライフ;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    
    
    public function histories()
    {
        return $this->hasMany('はぴワーママライフ\History');
    }

}
