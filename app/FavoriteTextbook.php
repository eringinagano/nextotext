<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteTextbook extends Model
{
    //
    protected $fillable = [
        'textbook_id', 'user_id',
    ];
}
