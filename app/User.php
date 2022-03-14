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
        'name', 'image', 'email', 'password', 'university_id',
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
    
    
    public function university() {
        return $this->belongsTo('App\University');
    }
    
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
    
}