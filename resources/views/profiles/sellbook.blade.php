@extends('layouts.profile_sellbook_header')
@section('content')
<div class="container sellbook-container">
    <h2 class="detail-title">Textbook Detail</h2>
    <div class="detail-wrapper">
      <ul>
          <li>
            <img src="{{$textbook->image }}" width="400px" height="400px">
          </li>
          <li class="detail-text">
            <p>タイトル：{{ $textbook->name }}</p>
            <p>著者：{{ $textbook->author_name }}</p>
            <p>カテゴリー：{{ $textbook->category->name }}</p>
            <p>使用された大学：{{ $textbook->sellBook->university_name}}</p>
            <p class="review-title">受け取った学生からのレビュー</p>
            <p>{{ $textbook->review }}</p>
          </li>
      </ul>
    </div>
</div>    
@endsection