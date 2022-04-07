@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">Textbooks</h2>
    <div class="right-wrapper">
      <form action="{{ route('textbook.search') }}" method="POST">
      @csrf
        <ul>
          <li>
            <p class="text">フリーワード</p>
          </li>
          <li class="search-word">
            <input name="search_word" class="form-control" placeholder="著者名・タイトル名">  
          </li>
          <li>
            <input type="submit" class="btn btn-outline-success" value="検索">
          </li>
        </ul>
      </form><br>
      <form action="{{ route('textbook.category') }}" method="POST">
      @csrf    
        <ul>
          <li>
            <p class="text">条件指定</p>
          </li>
          <li class="university-condition">
            <input name="university_name" class="form-control" placeholder="大学名　例：山田大学">
          </li>
          <li class="input-wrapper">
            <select name="category_id" class="custom-select">
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach  
            </select>
          </li>
          <li>
            <input type="submit" class="btn btn-outline-success" value="検索">
          </li>
        </ul>
      </form>
    </div>
    <div class="index-wrapper">
      <ul>
        @foreach($textbooks as $textbook)
        <li>
          <img src="{{ $textbook->image }}">
          <div class="text-wrapper">
              <p>タイトル：{{ $textbook->name }}</p>
              <p>カテゴリー：{{ $textbook->category->name}}</p>
              <p>使用された大学：{{ $textbook->sellBook->university_name}}</p>
          </div>
          @guest
          @else
            <a href="/textbook/{{ $textbook->id }}" class="btn btn-outline-success index-btn">詳細</a>
          @endguest
        </li>
        @endforeach
      </ul>
    </div>
</div>    
@endsection