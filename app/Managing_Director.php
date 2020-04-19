<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managing_Director extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function executive(){
        return $this->hasMany('App\Senior_Executive', 'md_id', 'id');
    }
    
    public function employee(){
        return $this->hasMany('App\Employee', 'md_id', 'id');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'dep_id', 'id');
    }

    public function message(){
		return $this->hasMany('App\assign_facebook_message', 'md_id', 'id');
	}
}
