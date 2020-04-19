<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assign_facebook_message extends Model
{
    public function director(){
        return $this->belongsTo('App\Managing_Director',  'md_id', 'id');
    }
    
    public function executive(){
		return $this->belongsTo('App\Senior_Executive', 'se_id', 'id');
    }
    
    public function employee(){
		return $this->belongsTo('App\Employee', 'e_id', 'id');
    }
}
