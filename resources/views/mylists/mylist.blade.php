@extends('layouts.mylist_header')
@section('content')
<div class="container mylist-container">
    <h2 class="mylist-title">My List</h2>
    <div class="mylist-wrapper">
      <ol class="mylist">
      @foreach( $user->mylists as $mylist)  
        <li>タイトル：{{ $mylist->textbook_name }}<br>
            著者：{{ $mylist->author_name }}
        </li>
      @endforeach  
      </ol>
    </div>
    <div class="btn-wrapper">
        <a href="/mylist/register" class="btn btn-outline-success mylist-btng">マイリスト追加</a>
    </div>
</div>
@endsection