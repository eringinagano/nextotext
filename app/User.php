<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'email', 'password', 'university_name', 'provider', 'provided_user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function buyBooks() {
        return $this->hasMany('App\Textbook', 'buyer_id');
    }
    
    public function sellBooks() {
        return $this->hasMany('App\Textbook', 'seller_id');
    }
    
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    
    public function favoriteTextbooks() {
        return $this->belongsToMany('App\Textbook');
    }
    
    public function group() {
        return $this->hasOne('App\Group');
    }
    
    public function messages() {
        return $this->hasMany('App\Message', 'sender_id');
    }
    
    public function mylists() {
        return $this->hasMany('App\MyList');
    }
    
     public static function getProfileUser($id) {
        return static::where('id', $id)->first();
    }
    
    public function checkUniversity() {
        if($this->university_name === NULL) {
            return false;
        } else {
            return true;
        }
    }
}