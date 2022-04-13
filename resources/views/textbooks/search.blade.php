@extends('layouts.textbook_category_header')
@section('content')
<div class="container category-container">
  <h2 class="category-title">Search Results</h2>
  <div class="category-wrapper">
    <ul>
      @foreach($search_textbooks as $search_textbook)
        <li>
          <img src="{{ $search_textbook->image }}" width="200px" height="200px">
          <div class="text-wrapper">
            <p>タイトル：{{ $search_textbook->name }}</p>
            <p>カテゴリー：{{ $search_textbook->category->name }}</p>
            <p>使用された大学：{{ $search_textbook->sellBook->university_name }}</p>
          </div>
          @guest
          @else
            <a href="/textbook/{{ $search_textbook->id }}" class="btn btn-outline-success category-btn">詳細</a>
          @endguest
        </li>
      @endforeach
    </ul>
  </div>
  <a class="btn btn-outline-success category-index-btn" href="{{ route('textbook.index') }}">教科書一覧に戻る</a>
</div>    
@endsection