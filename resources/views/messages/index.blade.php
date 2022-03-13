@extends('layouts.message_index_header')
@section('content')
<div class="container message-container">
    <h2 class="message-title">Chat</h2>
    <div class="message-wrapper">
      <ul class="list-group">
        <li class="list-group-item">山田太郎<a class="btn btn-outline-success message-btn">チャット</a></li>
        <li class="list-group-item">佐藤寛太<a class="btn btn-outline-success message-btn">チャット</a></li>
        <li class="list-group-item">谷本聡<a class="btn btn-outline-success message-btn">チャット</a></li>
        <li class="list-group-item">梶田啓介<a class="btn btn-outline-success message-btn">チャット</a></li>
        <li class="list-group-item">田村将司<a class="btn btn-outline-success message-btn">チャット</a></li>
      </ul>
    </div>
</div>
@endsection 