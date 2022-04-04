<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'group_id', 'message',
    ];
    
    public function group() {
        return $this->belongsTo('App\Group');
    }
}
