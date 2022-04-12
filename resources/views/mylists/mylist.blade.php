@extends('layouts.mylist_header')
@section('content')
<div class="container mylist-container">
    <h2 class="mylist-title">My List</h2>
    <div class="mylist-wrapper">
      <ul class="list-group">
        @foreach( $user->mylists as $mylist)  
          <li class="list-group-item">
              <p>タイトル：{{ $mylist->textbook_name }}</p>
              <p>著者：{{ $mylist->author_name }}</p>
              <a href="" class="btn btn-outline-danger delete-btn">削除</a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="btn-wrapper">
        <a href="/mylist/register" class="btn btn-outline-success mylist-btng">マイリスト追加</a>
    </div>
</div>
@endsection