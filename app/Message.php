<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'buyer_id', 'seller_id', 'textbook_id', 'message'
    ];
    
    public function textbook() {
        return $this->belongsTo('App\Textbook');
    }
}
