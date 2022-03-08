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
    
    
    
}
