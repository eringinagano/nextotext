@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">Favorite Textbooks</h2>
    <ul>
        @foreach($user->favoriteTextbooks as $favoriteTextbook)
        <li>
            <div class="index-container">
              <img src="{{ asset('storage/'.$favoriteTextbook->image) }}" width="200px" height="200px">
              <div class="text-wrapper">
                  <p>Title：{{ $favoriteTextbook->name }}</p>
                  <p>Category：{{ $favoriteTextbook->category->name}}</p>
              </div>
              <a href="/textbook/{{ $favoriteTextbook->id }}" class="btn btn-outline-success index-btn">詳細</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>    
@endsection