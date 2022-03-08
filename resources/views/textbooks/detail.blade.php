@extends('layouts.textbook_detail_header')
@section('content')
<div class="container profile-container">
    <h2 class="detail-title">教科書詳細画面</h2>
    <div class="detail-wrapper">
      <ul>
          <li>
            <img src="{{ asset('storage/'.$textbook->image) }}" width="400px" height="400px">
          </li>
          <li class="detail-text">
            <p>タイトル：{{ $textbook->name }}</p>
            <p>著者：{{ $textbook->author->name }}</p>
            <p>学問分野：{{ $textbook->category->name }}</p>
            <p>教科書の状態：{{ $textbook->textbook_state->name }}</p>
            <p>出品開始日：{{ $textbook->date_time }}</p>
            @if($favorite)
              <form action="/textbooks/{{ $textbook->id }}/delete" method="POST">
                @csrf
                <input type="submit" class="btn btn-primary detail-btn" value="お気に入りから削除"></a>
              </form>
            @else  
              <form action="/textbooks/{{ $textbook->id }}/favorite" method="POST">
                @csrf
                <input type="submit" class="btn btn-primary detail-btn" value="お気に入りに登録"></a>
              </form>
            @endif
            @if($reservation)
                <a href="/textbooks/{{ $textbook->id }}/reservation" class="btn btn-success detail-btn">予約する</a>
            @else
                <a href="" class="btn btn-success detail-btn">受け取る</a>
              </form>
            @endif
          </li>
      </ul>
    </div>
</div>    
@endsection