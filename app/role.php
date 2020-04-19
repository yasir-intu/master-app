<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model{
    protected $primayKey='role_id';
    
    public function user(){
        return $this->hasMany('App\User', 'role_id', 'role_id');
    }
}
