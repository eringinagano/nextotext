<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Author;
use App\Textbook;
use App\TextbookState;
use App\Message;
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
            'date_time' => $date,
        ]);
        
        return redirect(route('textbook.index'));
        
    }
    
    public function showTextbooks(Textbook $textbook, Category $category) {
        return view('textbooks/index')->with(['textbooks' => $textbook->get(), 'categories' => $category->get()]);
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
        $startdate = new Carbon($textbook->date_time);
        $reservation = true;
        
        if($now < $startdate ) {
            $reservation = true;
        } else {
            $reservation = false;
        }
        
        $reserved = false;
        
        if($textbook->reservation_id) {
            $reserved = true;
        } else {
            $reserved = false;
        }
        
        return view('textbooks/detail')->with(['textbook' => $textbook, 'favorite' => $favorite, 'reservation' => $reservation, 'reserved' => $reserved]);
    }
    
    public function addFavoriteTextbook(Textbook $textbook) {
        $user = Auth::user();
        $user->favoriteTextbooks()->syncWithoutDetaching($textbook->id);

        return redirect(route('textbook.index'));
    }
    
    public function removeFavoriteTextbook(Textbook $textbook) {
        $user = Auth::user();
        $user->favoriteTextbooks()->detach($textbook->id);

        return redirect(route('textbook.index'));
    }
    
    public function showFavorites() {
        $user = Auth::user();
        return view('textbooks/favorites')->with(['user' => $user]);
    }
    
    public function checkCategory(Request $request) {
        $category_id = $request['category_id'];
        $codition_textbooks = Textbook::where('category_id', '=', $category_id)->get();
        
        return view('textbooks/category')->with(['condition_textbooks' => $codition_textbooks]);
    }
    
    public function addChat(Textbook $textbook, Message $message) {
        $user_id = Auth::id();
        
        $message->create([
            'buyer_id' => $user_id,
            'seller_id' => $textbook->seller_id,
            'textbook_id'=> $textbook->id
        ]);
        
        return redirect(route('messages'));
    }
}
