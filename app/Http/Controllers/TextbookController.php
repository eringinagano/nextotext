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
use App\Http\Requests\PostRequest;
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
    
    public function postTextbookForm(Textbook $textbook, PostRequest $request) {
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
        $img_path = Storage::disk('s3')->url($path);
        
        $user_id = Auth::id();
        $user = Auth::user();
        
        $date = $request['date'];
        $name = $request['name'];
        $author_name = $request['author_name'];
        $category_id = $request['category_id'];
        $textbook_state_id = $request['textbook_state_id'];
        $textbook->addTextbook($img_path, $name, $author_name, $category_id, $user_id, $textbook_state_id, $date);
        
        return redirect(route('textbook.index'));
        
    }
    
    public function showTextbooks(Category $category) {
        $textbooks = Textbook::where('is_booked', false)
                             ->get();
        
        return view('textbooks/index')->with(['textbooks' => $textbooks, 'categories' => $category->get()]);
    }
    
    public function showTextbookDetail(Textbook $textbook) {
        $user_id = Auth::id();
        $user_infos = User::find($user_id);
        $textbook_id =$textbook->id;
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
        $reservation = $textbook->checkReservation($now, $startdate);
        
        return view('textbooks/detail')->with(['textbook' => $textbook, 'favorite' => $favorite, 'reservation' => $reservation]);
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
    
    public function checkCategory(ConditionRequest $request, Builder $query) {
        $university_name = $request['university_name'];
        $category_id = $request['category_id'];
        $condition_textbooks = Textbook::checkCondition($university_name, $category_id);
        
        return view('textbooks/category')->with(['condition_textbooks' => $condition_textbooks]);
    }
    
    public function searchWord(SearchRequest $request) {
        $search_word = $request['search_word'];
        $search_textbooks = Textbook::checkWord($search_word);
                                  
        return view('textbooks/search')->with(['search_textbooks' => $search_textbooks]);                          
    }
    
    public function addChat(Textbook $textbook, Group $group) {
        $user_id = Auth::id();
        $textbook_id = $textbook->id;
        $seller_id = $textbook->seller_id;
        
        $textbook->updateTextbook($user_id);
        $group->addGroup($user_id, $seller_id, $textbook_id);
        
        return redirect(route('message.index'));
    }
}
