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
}
