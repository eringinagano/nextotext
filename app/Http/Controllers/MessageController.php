<?php

namespace App\Http\Controllers;

use App\Message;
use App\Group;
use App\Textbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    private $message;
    
    public function __construct()
    {
        $this->message = new Message();
    }
    
    public function showMessages() {
        $user_id = Auth::id();
        $groups = Group::searchGroup($user_id);
                    
        return view('messages/index')->with(['groups' => $groups, 'user_id' => $user_id]);
    }
    
    public function showMessageDetail(Group $group, Message $message) {
        $user_id = Auth::id();
        $group_id = $group->id;
        $message_infos = Message::searchMessage($group_id);
        
        return view('messages/detail')->with(['group' => $group, 'user_id' => $user_id, 'message_infos' => $message_infos]);
    }
    
    public function postMessage(Request $request, Group $group, Message $message) {
        $group_id = $group->id;
        $user_id = Auth::id();
        $message_content = $request['message'];
        
        $message = $this->message->createMessage($group_id, $user_id, $message_content);
        
        return redirect()->route('message.detail', $group_id);
    }
    
    public function showDeleteForm(Group $group) {
        return view('messages/delete')->with(['group' => $group]);
    }
    
    public function deleteChat(Request $request, Group $group) {
        $review = $request['review'];
        $textbook_id = $group->textbook_id;
        $textbook = Textbook::where('id', $textbook_id);
        
        $textbook->update([
            'review' => $review,
        ]);
        
        $group->delete();
        
        return redirect(route('textbook.index'));
    }
}
