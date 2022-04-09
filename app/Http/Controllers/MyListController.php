<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyListController extends Controller
{
    //
    public function showMyList() {
        return view('mylist');
    }
}
