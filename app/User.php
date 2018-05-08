<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



//realtion of role
    public function role(){
        return $this->belongsTo('App\Role');
    }


//relation of photo
    public function photo() {
        return $this->belongsTo('App\Photo');
    }


//isAdmin
    public function isAdmin(){

        //role here is relationship
        if($this->role->name == "Admin" && $this->is_active == 1){

            return true;
        }

        return false;
    }

}

