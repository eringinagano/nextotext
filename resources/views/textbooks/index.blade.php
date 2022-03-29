@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">Textbooks</h2>
    <form action="{{ route('textbook.category') }}" method="POST">
      @csrf    
      <div class="condition-wrapper">
        <ul>
          <li class="input-text">
            <p>検索条件</p>
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
            <input type="submit" class="btn btn-outline-success post-btn" value="検索">
          </li>
        </ul>
      </div>
    </form>
    <div class="index-wrapper">
      <ul>
        @foreach($textbooks as $textbook)
        <li>
          <img src="{{ asset('storage/'.$textbook->image) }}" width="200px" height="200px">
          <div class="text-wrapper">
              <p>タイトル：{{ $textbook->name }}</p>
              <p>カテゴリー：{{ $textbook->category->name}}</p>
              <p>使用された大学：{{ $textbook->sellBook->university_name}}</p>
          </div>
          <a href="/textbook/{{ $textbook->id }}" class="btn btn-outline-success index-btn">詳細</a>
        </li>
        @endforeach
      </ul>
    </div>
</div>    
@endsection