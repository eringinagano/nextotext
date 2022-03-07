<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function textbooks() {
        return $this->hasMany('App\Textbook');
    }
    
    public function users() {
        return $this->belongsToMany('App/User');
    }
}
