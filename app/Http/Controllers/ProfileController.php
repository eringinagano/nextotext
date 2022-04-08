<?php

namespace App\Http\Controllers;

use App\User;
use App\University;
use App\Category;
use App\Textbook;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function showProfile($id) {
        $user = User::where('id', $id)->first();
        
        $university = true;
        
        if($user->university_name === NULL) {
            $university = false;
        } else {
            $university = true;
        }
        
        return view('profiles/profile')->with(['user' => $user, 'university' => $university]);
    }
    
    public function showEditProfile(Category $category) {
        return view('profiles/edit_profile')->with(['user' => Auth::user(), 'categories' => $category->get()]);
    }
    
    public function editProfile(Request $request) {
        
        $user = Auth::user();
        $user->categories()->sync($request['category_id']);
        
        $user->update([
            'university_name' => $request['university_name'],
        ]);
        
        return redirect( route('profile') );
        
    }
    
    public function showSellbookDetail(Textbook $textbook) {
        return view('/profiles/sellbook')->with(['textbook' => $textbook]);
    }
    
    
    
}
