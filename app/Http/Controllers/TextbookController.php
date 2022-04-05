<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Author;
use App\Textbook;
use App\TextbookState;
use App\Message;
use App\Group;
use Carbon\Carbon;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\ConditionRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TextbookController extends Controller
{
    //
    public function showTextbookForm(Category $category, Author $author, TextbookState $textbookstate) {
        return view('textbooks/post')->with(['categories' => $category->get(), 'textbookstates' => $textbookstate->get()]);
    }
    
    public function postTextbookForm(Textbook $textbook, Request $request) {
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
        $img_path = Storage::disk('s3')->url($path);
        
        $user_id = Auth::id();
        $user = Auth::user();
        
        $date = $request['date'];
        
        
        
        $textbook->create([
            'image'=> $img_path,
            'name' => $request['name'],
            'author_name' => $request['author_name'],
            'category_id' => $request['category_id'],
            'seller_id' => $user->id,
            'textbook_state_id' => $request['textbook_state_id'],
            'date_time' => $date,
            'is_booked' => 0
        ]);
        
        return redirect(route('textbook.index'));
        
    }
    
    public function showTextbooks(Category $category) {
        $textbooks = Textbook::where('is_booked', false)
                             ->get();
        
        return view('textbooks/index')->with(['textbooks' => $textbooks, 'categories' => $category->get()]);
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
    
    public function checkCategory(ConditionRequest $request) {
        $university_name = $request['university_name'];
        $category_id = $request['category_id'];
        $codition_textbooks = Textbook::whereHas('sellBook', function (Builder $query) use ($university_name){
                                $query->where('university_name', 'like', $university_name);})
                                ->where('category_id', $category_id)
                                ->get();
        
        return view('textbooks/category')->with(['condition_textbooks' => $codition_textbooks]);
    }
    
    public function searchWord(SearchRequest $request) {
        $search_word = $request['search_word'];
        $search_textbooks = Textbook::where('name', $search_word)
                                  ->orWhere('author_name', $search_word)
                                  ->get();
                                  
        return view('textbooks/search')->with(['search_textbooks' => $search_textbooks]);                          
    }
    
    public function addChat(Textbook $textbook, Group $group) {
        $user_id = Auth::id();
        
        $textbook->update([
          'is_booked' => 1
        ]);
        
        $group->create([
            'buyer_id' => $user_id,
            'seller_id' => $textbook->seller_id,
            'textbook_id'=> $textbook->id
        ]);
        
        return redirect(route('messages'));
    }
}
