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
        $user = Auth::user();
        
        $university = true;
        
        if($user['university_id'] === NULL) {
            $university = false;
        } else {
            $university = true;
        }
        
        return view('profiles/profile')->with(['user' => $user, 'university' => $university]);
    }
    
    public function showEditProfile(University $university, Category $category) {
        return view('profiles/edit_profile')->with(['user' => Auth::user(), 'universities' => $university->get(), 'categories' => $category->get()]);
    }
    
    public function editProfile(Request $request) {
        $img_name = $request->file('image')->getClientOriginalName();
        $img_path = $request->file('image')->storeAs('',$img_name,'public');
        
        $user = Auth::user();
        $user->categories()->sync($request['category_id']);
        
        $user->update([
            'name' => $request['name'],
            'university_id' => $request['university_id'],
            'image' => $img_path
        ]);
        
        return redirect( route('profile') );
        
    }
    
    
    
}
