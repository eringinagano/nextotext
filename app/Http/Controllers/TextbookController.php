<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Author;
use App\Textbook;
use App\TextbookState;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextbookController extends Controller
{
    //
    public function showTextbookForm(Category $category, Author $author, TextbookState $textbookstate) {
        return view('textbooks/post')->with(['categories' => $category->get(), 'authors' => $author->get(), 'textbookstates' => $textbookstate->get()]);
    }
    
    public function postTextbookForm(Textbook $textbook, Request $request) {
        $img_name = $request->file('image')->getClientOriginalName();
        $img_path = $request->file('image')->storeAs('',$img_name,'public');
        
        $user_id = Auth::id();
        $user = Auth::user();
        
        $date = $request['date'];
        
        
        
        $textbook->create([
            'image'=> $img_path,
            'name' => $request['name'],
            'author_id' => $request['author_id'],
            'category_id' => $request['category_id'],
            'seller_id' => $user->id,
            'textbook_state_id' => $request['textbook_state_id'],
            'university_id' => $user->university_id,
            'date_time' => $date,
        ]);
        
        return redirect()->route('profile');
        
    }
    
    public function showTextbooks(Textbook $textbook) {
        return view('textbooks/index')->with(['textbooks' => $textbook->get()]);
    }
    
    public function showTextbookDetail(Textbook $textbook) {
        $user_id = Auth::id();
        $textbook_id =$textbook->id;
        $user_infos = User::find($user_id);
        
        $favorite = false;
        
       foreach($user_infos->favoriteTextbooks as $user_info) {
            if($user_info['id'] === $textbook_id) {
                $favorite = true;
                break;
            } else {
                $favorite = false;
            }
        }
        
        $now = new Carbon();
        $postdate = new Carbon($textbook->date_time);
        $reservation = true;
        
        if($now < $postdate ) {
            $reservation = true;
        } else {
            $reservation = false;
        }
        
        return view('textbooks/detail')->with(['textbook' => $textbook, 'favorite' => $favorite, 'reservation' => $reservation]);
    }
    
    public function addFavoriteTextbook(Textbook $textbook) {
        $user = Auth::user();
        $user->favoriteTextbooks()->syncWithoutDetaching($textbook->id);

        return redirect(route('textbook.index'));
    }
}
