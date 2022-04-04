@extends('layouts.message_detail_header')
@section('content')
<div class="container message-container">
    <div class="message-wrapper">
        @foreach($message_infos as $message_info)
          @if($user_id === $message_info->group->seller_id)
            <div class="balloon6">
                <div class="faceicon">
                  <img src="{{ $message_info->group->textbook->sellBook->image }}">
                </div>
                <div class="chatting">
                  <div class="says">
                    <p>{{ $message_info->message }}</p>
                  </div>
                </div>
            </div>
          @else
            <div class="mycomment">
                <p>
                {{ $message_info->message }}
                </p>
            </div>
          @endif
        @endforeach
    </div>
</div>
<div class="input-wrapper">
    <form action="/message/{{ $group->id }}/detail" method="POST">
    @csrf
        <ul>
            <li class="message">
                <input class="form-control" name="message">
            </li>
            <li>
                <input type="submit" value="送信" class="btn btn-outline-success">
            </li>
        </ul>
   </form>
</div>
@endsection 