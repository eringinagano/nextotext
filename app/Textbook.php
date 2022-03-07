<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    //
    protected $fillable = [
        'image','name', 'author_id', 'category_id', 'textbook_state_id', 'seller_id', 'university_id', 'date_time'
    ];
    
    public function category() {
        return $this->belongsTo('App\Category');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function textbook_state() {
        return $this->belongsTo('App\TextbookState');
    }
    
    public function author() {
        return $this->belongsTo('App\Author');
    }
    
    public function university() {
        return $this->belongsTo('App\University');
    }
    
    public function favoriteItems() {
        return $this->belongsToMany('App\User');
    }
}
