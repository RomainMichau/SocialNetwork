<?php

namespace App;

use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    public function setProfilAttribute($profil){
        if(is_object($profil) && $profil->isValid()){
            $profil->move(public_path(). "/img/profils","{$this->id}.png");
            $this->attributes['profil'] = true;
        }
    }
    use Friendable;

}
