<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'textbook_id' ,'seller_id', 'buyer_id',
    ];
    
    public function textbook() {
        return $this->belongsTo('App\Textbook',);
    }
    
    public function messages() {
        return $this->hasMany('App\Message');
    }
    
    public function addGroup($user_id, $seller_id, $textbook_id) {
        $this->create([
            'buyer_id' => $user_id,
            'seller_id' => $seller_id,
            'textbook_id'=> $textbook_id
        ]);
    }
    
    public static function searchGroup($user_id) {
        return static::where('seller_id', '=', $user_id )
                     ->orWhere('buyer_id', '=', $user_id)
                     ->get();
    }
}
