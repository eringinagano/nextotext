<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    //
    protected $fillable = [
        'textbook_name', 'author_name'
    ];
    
    public function users() {
        return $this->belongsTo('App\User');
    }
}
