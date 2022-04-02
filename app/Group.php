<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'textbook_id' ,'seller_id', 'buyer_id',
    ];
    
    public function Textbook() {
        return $this->belongsTo('App\Textbook');
    }
    
    public function Messages() {
        return $this->hasMany('App\Message');
    }
}
