<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
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
        'name', 'email', 'password', 'profil', 'couverture'
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
        return $this->hasMany('App\Post');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    /*public function scopePost($query)
    {
        dd($query);
        return $query->where('active', 1);
    }*/

    public function setProfilAttribute($profil){
        if(is_object($profil)){
            if($profil->isValid()){
                $profil->move(public_path() . "/img/profils", "{$this->id}.png");
                $this->attributes['profil'] = true;
            }
        }
        elseif ($profil == 1)
        {
            $this->attributes['profil'] = $profil;
        }
    }
    public function setCouvertureAttribute($couverture){
        if(is_object($couverture)){
            if($couverture->isValid()){
                $couverture->move(public_path() . "/img/couverture", "{$this->id}.png");
                $this->attributes['couverture'] = true;
            }
        }
        elseif ($couverture == 1)
        {
            $this->attributes['couverture'] = $couverture;
        }
    }
    use Friendable;
    use Messagable;

}
