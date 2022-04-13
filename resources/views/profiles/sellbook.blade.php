@extends('layouts.profile_sellbook_header')
@section('content')
<div class="container detail-container">
  <h2 class="detail-title">Textbook Detail</h2>
  <div class="detail-wrapper">
    <ul>
      <li class="image">
        <img src="{{ $textbook->image }}">
      </li>
      <li class="detail-text">
        <p>タイトル</p>
        <p class="large">{{ $textbook->name }}</p>
        <p>著者</p>
        <p class="large">{{ $textbook->author_name }}</p>
        <p class="underline">カテゴリー：{{ $textbook->category->name }}</p>
        <p class="underline">使用された大学：{{ $textbook->sellBook->university_name}}</p>
        <p class="review-title">受け取った学生からのレビュー</p>
        <p class="underline review-content">{{ $textbook->review }}</p>
      </li>
    </ul>
  </div>
</div>    
@endsection