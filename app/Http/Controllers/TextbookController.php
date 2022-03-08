<?php

namespace App\Http\Controllers;

use App\Category;
use App\Author;
use App\TextbookState;
use Illuminate\Http\Request;

class TextbookController extends Controller
{
    //
    public function showTextbookForm(Category $category, Author $author, TextbookState $textbookstate) {
        return view('textbooks/post')->with(['categories' => $category->get(), 'authors' => $author->get(), 'textbookstates' => $textbookstate->get()]);
    }
}
