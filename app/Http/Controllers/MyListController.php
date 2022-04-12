<?php

namespace App\Http\Controllers;

use App\MyList;
use Illuminate\Http\Request;
use App\Http\Requests\MylistRequest;
use Illuminate\Support\Facades\Auth;

class MyListController extends Controller
{
    //
    public function showMyList() {
        $user = Auth::user();
        
        return view('mylists.mylist')->with(['user' => $user]);
    }
    
    public function showRegisterForm() {
        return view('mylists.register');
    }
    
    public function addTextbook(MylistRequest $request, MyList $mylist) {
        $user_id = Auth::id();
        $textbook_name = $request['textbook_name'];
        $author_name = $request['author_name'];
        
        $mylist->create([
            'user_id' => $user_id,
            'textbook_name' => $textbook_name,
            'author_name' => $author_name,
        ]);
        
        return redirect(route('mylist'));
    }
}
