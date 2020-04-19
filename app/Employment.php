<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    public function em_type(){
        return $this->hasMany('App\Employee', 'em_id', 'id');
    }
}
