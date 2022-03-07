<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteItem extends Model
{
    //
    protected $fillable = [
        'textbook_id', 'user_id',
    ];
}
