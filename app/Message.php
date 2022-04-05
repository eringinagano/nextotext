<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'group_id', 'sender_id', 'message',
    ];
    
    public function group() {
        return $this->belongsTo('App\Group');
    }
    
    public function user() {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
