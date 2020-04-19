<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
