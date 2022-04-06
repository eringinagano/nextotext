@extends('layouts.message_delete_header')
@section('content')
<h3 class="note">最後に感謝の気持ちをレビューとして投稿者に伝えましょう！！</h3>
<div class="review-wrapper">
    <form action="/message/{{ $group->id }}/delete" method="POST">
        @csrf
        <textarea name="review" class="form-control"></textarea>
        <div class="btn-wrapper">
          <input type="submit" class="btn btn-outline-info" value="レビューを投稿してチャットを終了">
        </div>
    </form>
</div>
@endsection