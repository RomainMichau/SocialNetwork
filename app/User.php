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
        'name', 'email', 'password', 'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPictureAttribute($picture){
        //dd($picture);
        if(is_object($picture) && $picture->isValid()){
            $picture->move(public_path(). "/img/pictures","{$this->id}.png");
            $this->attributes['picture'] = true;
        }
    }
    use Friendable;

}
