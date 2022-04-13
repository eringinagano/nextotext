<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    //
    protected $fillable = [
        'user_id', 'textbook_name', 'author_name'
    ];
    
    public function users() {
        return $this->belongsTo('App\User');
    }
    
    public function addMylist($user_id, $textbook_name, $author_name) {
        $this->create([
            'user_id' => $user_id,
            'textbook_name' => $textbook_name,
            'author_name' => $author_name,
        ]);
    }
}
