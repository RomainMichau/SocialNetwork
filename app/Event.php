<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    public function video(){
        return $this->belongsTo('App\Video');
    }
}
