<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function textbooks() {
        return $this->hasMany('App\Textbook');
    }
}
