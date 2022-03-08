@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">教科書一覧</h2>
    <ul>
        @foreach($textbooks as $textbook)
        <li>
            <div class="index-container">
              <img src="{{ asset('storage/'.$textbook->image) }}" width="200px" height="200px">
              <div class="text-wrapper">
                  <p>タイトル：{{ $textbook->name }}</p>
                  <p>カテゴリー：{{ $textbook->category->name}}</p>
              </div>
              <a href="/textbooks/{{ $textbook->id }}" class="btn btn-success index-btn">詳細をみる</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>    
@endsection