@extends('layouts.mylist_register_header')
@section('content')
<div class="container mylist-container">
  <h2 class="mylist-title">My List</h2>
  <form action="{{ route('mylist.register') }}" method="POST">
    @csrf
    <div class="mylist-wrapper">
      <dl>
        <dt>タイトル</dt>
        <dd>
          <input class="form-control" name="textbook_name">
        </dd>
      </dl>
      <dl>
        <dt>著者</dt>
        <dd>
            <input class="form-control" name="author_name">
        </dd>
      </dl>
    </div>
    <div class="btn-wrapper">
      <input type="submit" class="btn btn-success edit-btn" value="マイリストに追加">
    </div>
  </form>
</div>
@endsection