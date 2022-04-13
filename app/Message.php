<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;

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
    
    public static function searchMessage($group_id) {
        return static::where('group_id', $group_id)
                     ->get();
    }
    
    public function createMessage($group_id, $user_id, $message_content) {
        $this->create([
            'group_id' => $group_id,
            'sender_id' => $user_id,
            'message' => $message_content,
        ]);
    }
}
