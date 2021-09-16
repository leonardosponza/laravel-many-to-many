<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts(){
        return $rhis->belongsToMany('App\Post');
    }
}
