<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestedCategory extends Model
{
    //
    protected $fillable = [
        'category_id', 'user_id',
    ];
}
