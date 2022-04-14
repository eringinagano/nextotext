<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Textbook extends Model
{
    //
    protected $fillable = [
        'image','name', 'author_name', 'category_id', 'textbook_state_id', 'buyer_id', 'seller_id', 'university_id', 'date_time', 'reservation_id', 'is_booked', 'review',
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
    
    public function updateReview($review) {
        $this->update([
            'review' => $review,
        ]);
    }
    
    public function addTextbook($img_path, $name, $author_name, $category_id, $user_id, $textbook_state_id, $date) {
        $this->create([
            'image'=> $img_path,
            'name' => $name,
            'author_name' => $author_name,
            'category_id' => $category_id,
            'seller_id' => $user_id,
            'textbook_state_id' => $textbook_state_id,
            'date_time' => $date,
            'is_booked' => false,
        ]);
    }
    
    public function isFavorite($user_infos, $textbook_id) {
        foreach($user_infos->favoriteTextbooks as $user_info) {
            if($user_info['id'] === $textbook_id) {
                return true;
                break;
            } else {
                return false;
            }
        }
    }
    
    public function checkReservation($now, $startdate) {
        if($now < $startdate ) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateTextbook($user_id) {
        $this->update([
          'buyer_id' => $user_id,
          'is_booked' => true,
        ]);
    }
    
    public function checkBook() {
        if( $this->is_booked === 1 ) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function checkCondition($university_name, $category_id) {
        return static::whereHas('sellBook', function (Builder $query) use ($university_name){
                       $query->where('university_name', 'like', $university_name);})
                       ->where('category_id', $category_id)
                       ->get();
    }
    
    public static function checkWord($search_word) {
        return static::where('name', $search_word)
                     ->orWhere('author_name', $search_word)
                     ->get();
    }
}
