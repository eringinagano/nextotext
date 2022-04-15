@extends('layouts.textbook_detail_header')
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
            <p class="underline">教科書の状態：{{ $textbook->textbook_state->name }}</p>
            <p class="underline bottom">出品開始日：{{ $textbook->date_time }}</p>
            @if( $favorite )
              <form action="/textbook/{{ $textbook->id }}/remove" method="POST">
                @csrf
                <input type="submit" class="btn btn-outline-primary detail-btn" value="お気に入りから削除">
              </form>
            @else
              <form action="/textbook/{{ $textbook->id }}/favorite" method="POST">
                @csrf
                <input type="submit" class="btn btn-outline-primary detail-btn" value="お気に入りに登録">
              </form>
            @endif
            @if( $reservation )
              <form action="/textbook/{{ $textbook->id }}/chat" method="GET">
                <input type="submit" class="btn btn-outline-success detail-btn" value="予約する">
              </form>
            @else
              <form action="/textbook/{{ $textbook->id }}/chat" method="GET">
                <input type="submit" class="btn btn-outline-success detail-btn" value="受け取る">
              </form>
            @endif
          </li>
      </ul>
    </div>
</div>    
@endsection