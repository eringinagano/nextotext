@extends('layouts.message_detail_header')
@section('content')
<div class="container message-container">
    <div class="message-wrapper">
        @foreach($message_infos as $message_info)
          <p>{{ $message_info->message }}</p>
        @endforeach
    </div>
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