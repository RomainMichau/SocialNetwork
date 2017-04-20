<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function video(){
        return $this->belongsTo('App\Video');
    }
    public function event(){
        return $this->belongsTo('App\Event');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
