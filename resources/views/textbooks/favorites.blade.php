@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">気になる教科書</h2>
    <ul>
        @foreach($user->favoriteTextbooks as $favoriteTextbook)
        <li>
            <div class="index-container">
              <img src="{{ asset('storage/'.$favoriteTextbook->image) }}" width="200px" height="200px">
              <div class="text-wrapper">
                  <p>タイトル：{{ $favoriteTextbook->name }}</p>
                  <p>カテゴリー：{{ $favoriteTextbook->category->name}}</p>
              </div>
              <a href="/textbook/{{ $favoriteTextbook->id }}" class="btn btn-success index-btn">詳細をみる</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>    
@endsection