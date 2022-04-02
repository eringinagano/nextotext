<?php

namespace App\Http\Controllers;

use App\Message;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function showMessages() {
        $user_id = Auth::id();
        $groups = Group::where('seller_id', '=', $user_id )
                           ->orWhere('buyer_id', '=', $user_id)
                           ->get();
                    
        return view('messages/index')->with(['groups' => $groups]);
    }
}
