<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function scopePicture($picture){
        if(is_object($picture) && $picture->isValid()){
            $picture->move(public_path(). "/img/photos","{$this->id}.png");
        }
    }
}
