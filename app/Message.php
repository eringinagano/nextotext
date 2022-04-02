<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'group_id', 'message',
    ];
    
    public function Group() {
        return $this->belongsTo('App\Group');
    }
}
