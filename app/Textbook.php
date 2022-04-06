<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    //
    protected $fillable = [
        'image','name', 'author_name', 'category_id', 'textbook_state_id', 'seller_id', 'university_id', 'date_time', 'reservation_id', 'is_booked', 'review',
    ];
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
    
     public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function buyBook() {
        return $this->belongsTo('App\User', 'buyer_id');
    }
    
    public function sellBook() {
        return $this->belongsTo('App\User', 'seller_id');
    }
    
    public function textbook_state() {
        return $this->belongsTo('App\TextbookState');
    }
    
    public function author() {
        return $this->belongsTo('App\Author');
    }
    
    public function favoriteItems() {
        return $this->belongsToMany('App\User');
    }
    
    public function messages() {
        return $this->hasMany('App\Message');
    }
    
     public function buyBooks() {
        return $this->hasMany('App\Message', 'buyer_id');
    }
    
    public function sellBooks() {
        return $this->hasMany('App\Message', 'seller_id');
    }
    
    public function isCheckDate($user_id) {
        // 
        $now = new Carbon();
        $startdate = new Carbon($this->date_time);
        
        if($now < $startdate ) {
             $this->reservation_id = $user_id;
             $this->save();
        } else {
            exit;
        }
    }
    
    
}
