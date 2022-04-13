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
        $user = User::getProfileUser($id);
        
        $university = $user->checkUniversity();
        
        return view('profiles/profile')->with(['user' => $user, 'university' => $university]);
    }
    
    public function showEditProfile($id, Category $category) {
        $user = User::getProfileUser($id);
        
        return view('profiles/edit_profile')->with(['user' => $user, 'categories' => $category->get()]);
    }
    
    public function editProfile($id, Request $request) {
        $user = User::getProfileUser($id);
        $user->categories()->sync($request['category_id']);
        
        $user->update([
            'university_name' => $request['university_name'],
        ]);
        
        return redirect('profile/'. $id);
    }
    
    public function showSellbookDetail($id) {
        $textbook = Textbook::where('id', $id)->first();
        return view('/profiles/sellbook')->with(['textbook' => $textbook]);
    }
}
