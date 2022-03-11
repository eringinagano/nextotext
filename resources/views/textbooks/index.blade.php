@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">Textbooks</h2>
    <ul>
        @foreach($textbooks as $textbook)
        <li>
            <div class="index-container">
              <img src="{{ asset('storage/'.$textbook->image) }}" width="200px" height="200px">
              <div class="text-wrapper">
                  <p>タイトル：{{ $textbook->name }}</p>
                  <p>カテゴリー：{{ $textbook->category->name}}</p>
              </div>
              <a href="/textbook/{{ $textbook->id }}" class="btn btn-outline-success index-btn">詳細</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>    
@endsection