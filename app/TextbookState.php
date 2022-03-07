<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextbookState extends Model
{
    //
    public function textbooks() {
        return $this->hasMany('App\Textbook');
    }
}
