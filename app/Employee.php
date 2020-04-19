<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function director(){
        return $this->hasOne('App\Managing_Director', 'id', 'md_id');
    }
    
    public function executive(){
        return $this->hasOne('App\Senior_Executive', 'id', 'se_id');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'dep_id', 'id');
    }

    public function em_type(){
        return $this->belongsTo('App\Employment', 'em_id', 'id');
    }

    public function message(){
		return $this->hasMany('App\assign_facebook_message', 'e_id', 'id');
	}
}
