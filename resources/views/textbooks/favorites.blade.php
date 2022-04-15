@extends('layouts.textbook_category_header')
@section('content')
<div class="container category-container">
  <h2 class="category-title">Favorite Textbooks</h2>
  <div class="category-wrapper">
    <ul>
      @foreach( $user->favoriteTextbooks as $favoriteTextbook )
        @if( $favoriteTextbook->is_booked )
        @else
          <li>
            <img src="{{ $favoriteTextbook->image }}">
            <div class="text-wrapper">
              <p>タイトル：{{ $favoriteTextbook->name }}</p>
              <p>カテゴリー：{{ $favoriteTextbook->category->name}}</p>
              <p>使用された大学：{{ $favoriteTextbook->sellBook->university_name }}</p>
            </div>
            <a href="/textbook/{{ $favoriteTextbook->id }}" class="btn btn-outline-success category-btn">詳細</a>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
</div>    
@endsection