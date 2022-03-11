@extends('layouts.textbook_category_header')
@section('content')
<div class="container category-container">
    <h2 class="category-title">Favorite Textbooks</h2>
    <div class="category-wrapper">
      <ul>
        @foreach($user->favoriteTextbooks as $favoriteTextbook)
        <li>
          <img src="{{ asset('storage/'.$favoriteTextbook->image) }}" width="200px" height="200px">
          <div class="text-wrapper">
              <p>Title：{{ $favoriteTextbook->name }}</p>
              <p>Category：{{ $favoriteTextbook->category->name}}</p>
          </div>
          <a href="/textbook/{{ $favoriteTextbook->id }}" class="btn btn-outline-success category-btn">詳細</a>
        </li>
        @endforeach
    </ul>
    </div>
</div>    
@endsection