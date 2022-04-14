<?php

namespace App\Http\Controllers;

use App\MyList;
use Illuminate\Http\Request;
use App\Http\Requests\MylistRequest;
use Illuminate\Support\Facades\Auth;

class MyListController extends Controller
{
    //
    private $mylist;
    
    public function __construct()
    {
        $this->mylist = new MyList();
    }
    
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
        
        $mylist = $this->mylist->addMylist($user_id, $textbook_name, $author_name);
        
        return redirect(route('mylist.index'));
    }
    
    public function deleteMylist(MyList $mylist) {
        $mylist->delete();
        
        return redirect(route('mylist.index'));
    }
}
