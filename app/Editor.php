<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
