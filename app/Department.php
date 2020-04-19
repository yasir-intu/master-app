<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function dDepartment(){
        return $this->hasMany('App\Managing_Director', 'dep_id', 'id');
    }

    public function exDepartment(){
        return $this->hasMany('App\Senior_Executive', 'dep_id', 'id');
    }

    public function eDepartment(){
        return $this->hasMany('App\Employee', 'dep_id', 'id');
    }
}
