@extends('layouts.message_detail_header')
@section('content')
<div class="line-bc">
  @foreach( $message_infos as $message_info )
    @if( $user_id != $message_info->sender_id )
      <div class="balloon6">
        <div class="faceicon">
          <img src="{{ $message_info->user->image }}">
        </div>
        <div class="chatting">
          <div class="says">
            <p>{{ $message_info->message }}</p>
          </div>
        </div>
      </div>
    @else
      <div class="mycomment">
        <p>{{ $message_info->message }}</p>
      </div>
    @endif
  @endforeach 
</div>
<div class="input-wrapper">
    <form action="/message/{{ $group->id }}/detail" method="POST">
    @csrf
      <div class="message-wrapper">
        <ul>
            <li class="message">
              <input class="form-control chat-form" name="message">
            </li>
            <li>
              <input type="submit" value="送信" class="btn btn-success" id="submit-btn">
            </li>
        </ul>
      </div>
   </form>
</div>
@endsection 