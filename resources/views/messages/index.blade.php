@extends('layouts.message_index_header')
@section('content')
<div class="container message-container">
    <h2 class="message-title">Chat</h2>
    <div class="message-wrapper">
      <ul class="list-group">
        @foreach($groups as $group)
          <li class="list-group-item">
            {{ $group->textbook->sellBook->name }}（{{ $group->textbook->name }}）
            <a href="/message/{{ $group->id }}/detail" class="btn btn-outline-success message-btn">チャット</a>
            <a href="/message/{{ $group->id }}/delete" class="btn btn-outline-danger">終了</a>
          </li>
        @endforeach
      </ul>
    </div>
</div>
@endsection 