<?php

namespace App\Http\Controllers;

use App\User;
use App\University;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function showProfile() {
        return view('profiles/profile')->with('user', Auth::user());
    }
    
    public function showEditProfile(University $university, Category $category) {
        return view('profiles/edit_profile')->with(['user' => Auth::user(), 'universities' => $university->get(), 'categories' => $category->get()]);
    }
    
    public function editProfile(Request $request) {
        $user = Auth::user();
        
        $user->categories()->sync($request['category_id']);
        
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        
        
        return view('profiles/profile')->with('user', $user);
        
    }
    
    
    
}
