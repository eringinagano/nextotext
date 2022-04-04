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
    
    public function showMessageDetail(Group $group, Message $message) {
        $user_id = Auth::id();
        
        $message_infos = Message::where('group_id', $group->id)
                               ->get();
        
        return view('messages/detail')->with(['group' => $group, 'user_id' => $user_id, 'message_infos' => $message_infos]);
    }
    
    public function postMessage(Request $request, Group $group, Message $message) {
        $message_content = $request['message'];
        
        $message->create([
            'group_id' => $group->id,
            'message' => $message_content,
        ]);
        
        return redirect()->route('message.detail', $group->id);
    }
}
