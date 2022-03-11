@extends('layouts.textbook_detail_header')
@section('content')
<div class="container detail-container">
    <h2 class="detail-title">Textbook Detail</h2>
    <div class="detail-wrapper">
      <ul>
          <li>
            <img src="{{ asset('storage/'.$textbook->image) }}" width="400px" height="400px">
          </li>
          <li class="detail-text">
            <p>タイトル：{{ $textbook->name }}</p>
            <p>著者：{{ $textbook->author->name }}</p>
            <p>カテゴリー：{{ $textbook->category->name }}</p>
            <p>教科書の状態：{{ $textbook->textbook_state->name }}</p>
            <p>出品開始日：{{ $textbook->date_time }}</p>
            @if($favorite)
              <form action="/textbook/{{ $textbook->id }}/remove" method="POST">
                @csrf
                <input type="submit" class="btn btn-outline-primary detail-btn" value="お気に入りから削除"></a>
              </form>
            @else  
              <form action="/textbook/{{ $textbook->id }}/favorite" method="POST">
                @csrf
                <input type="submit" class="btn btn-outline-primary detail-btn" value="お気に入りに登録"></a>
              </form>
            @endif
            @if($reservation)
              @if($reserved)
                <p class="reserved">この教科書は予約済みです</p>
              @else
                <a href="/textbook/{{ $textbook->id }}/reserve" class="btn btn-outline-success detail-btn">予約する</a>
              @endif
            @else
                <a href="" class="btn btn-outline-success detail-btn">受け取る</a>
              </form>
            @endif
          </li>
      </ul>
    </div>
</div>    
@endsection