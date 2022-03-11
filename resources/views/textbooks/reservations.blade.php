@extends('layouts.textbook_category_header')
@section('content')
<div class="container category-container">
    <h2 class="category-title">Reserved Textbooks</h2>
    <div class="category-wrapper">
      <ul>
        @foreach($reservation_infos as $reservation_info)
        <li>
          <img src="{{ asset('storage/'.$reservation_info->image) }}" width="200px" height="200px">
          <div class="text-wrapper">
              <p>Title：{{ $reservation_info->name }}</p>
              <p>Category：{{ $reservation_info->category->name}}</p>
          </div>
          <a href="/textbook/{{ $reservation_info->id }}" class="btn btn-outline-success category-btn">詳細</a>
        </li>
        @endforeach
      </ul>  
    </div>
</div>    
@endsection