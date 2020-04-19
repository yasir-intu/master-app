<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_name', 'provider', 'provider_id', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roleName(){
        return $this->belongsTo('App\role', 'role_id', 'role_id');
    }
    
    public function superAdmin()
    {
        return $this->hasOne('App\SuperAdmin', 'user_id', 'id');
    }
    
    public function director(){
        return $this->hasOne('App\Managing_Director', 'user_id', 'id');
    }
    public function executive(){
        return $this->hasOne('App\Senior_Executive', 'user_id', 'id');
    }
    public function employee(){
        return $this->hasOne('App\Employee', 'user_id', 'id');
    }
    public function author(){
        return $this->hasOne('App\Author', 'user_id', 'id');
    }
    public function editor()
    {
        return $this->hasOne('App\Editor', 'user_id', 'id');
    }
    public function customer()
    {
        return $this->hasOne('App\Customer', 'user_id', 'id');
    }
}
