@extends('layouts.textbook_index_header')
@section('content')
<div class="container index-container">
    <h2 class="index-title">Reserved Textbooks</h2>
    <ul>
        @foreach($reservation_infos as $reservation_info)
        <li>
            <div class="index-container">
              <img src="{{ asset('storage/'.$reservation_info->image) }}" width="200px" height="200px">
              <div class="text-wrapper">
                  <p>Title：{{ $reservation_info->name }}</p>
                  <p>Category：{{ $reservation_info->category->name}}</p>
              </div>
              <a href="/textbook/{{ $reservation_info->id }}" class="btn btn-outline-success index-btn">詳細</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>    
@endsection