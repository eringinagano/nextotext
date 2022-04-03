<?php

namespace App\Http\Controllers;

use App\User;
use App\University;
use App\Category;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function showProfile() {
        $user = Auth::user();
        
        $university = true;
        
        if($user['university_name'] === NULL) {
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
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
        $img_path = Storage::disk('s3')->url($path);
        
        $user = Auth::user();
        $user->categories()->sync($request['category_id']);
        
        $user->update([
            'name' => $request['name'],
            'university_name' => $request['university_name'],
            'image' => $img_path
        ]);
        
        return redirect( route('profile') );
        
    }
    
    
    
}
