@extends('layouts.message_index_header')
@section('content')
<div class="container message-container">
    <h2 class="message-title">Chat</h2>
    <div class="message-wrapper">
      <ul class="list-group">
        @foreach($groups as $group)
          <li class="list-group-item">
            @if($user_id === $group->textbook->sellBook->id)
              <a href="/profile/{{ $group->textbook->buyBook->id }}" class="name">{{ $group->textbook->buyBook->name }}</a>
              <p>（{{ $group->textbook->name }}）</p>
              <a href="/message/{{ $group->id }}/detail" class="btn btn-outline-success message-btn">チャット</a>
              <a href="/message/{{ $group->id }}/delete" class="btn btn-outline-danger finish-btn">終了</a>
            @else
              <a href="/profile/{{ $group->textbook->sellBook->id }}" class="name">{{ $group->textbook->sellBook->name }}</a>
              <p>（{{ $group->textbook->name }}）</p>
              <a href="/message/{{ $group->id }}/detail" class="btn btn-outline-success message-btn">チャット</a>
              <a href="/message/{{ $group->id }}/delete" class="btn btn-outline-danger finish-btn">終了</a>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
</div>
@endsection 