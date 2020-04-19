<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senior_Executive extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function director(){
        return $this->hasOne('App\Managing_Director', 'id', 'md_id');
    }

    public function employee(){
        return $this->hasMany('App\Employee', 'se_id', 'id');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'dep_id', 'id');
    }

    public function message(){
		return $this->hasMany('App\assign_facebook_message', 'se_id', 'id');
	}
}
