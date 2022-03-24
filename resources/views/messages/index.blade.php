@extends('layouts.message_index_header')
@section('content')
<div class="container message-container">
    <h2 class="message-title">Chat</h2>
    <div class="message-wrapper">
      <ul class="list-group">
        @foreach($messages as $message)
          <li class="list-group-item">{{ $message->textbook->sellBook->name }}<a class="btn btn-outline-success message-btn">チャット</a></li>
        @endforeach
      </ul>
    </div>
</div>
@endsection 