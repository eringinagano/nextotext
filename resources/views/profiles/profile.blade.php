@extends('layouts.profile_header')
@section('content')
<div class="container profile-container">
  <h2 class="profile-title">Profile</h2>
  <div class="profile-wrapper">
    <ul>
      <li class="image">
        <img src="{{ $user->image }}" class="profile-img">
      </li>
      <li class="text-wrapper">
        <dl>
          <dt>Name</dt>
          <dd>{{ $user->name }}</dd>
        </dl>
        <dl>
          <dt>University</dt>
            @if( $university )
              <dd>{{ $user->university_name }}</dd>
            @else
            <dd class="university_null"></dd>
        @endif
        </dl>
        <dl>
          <dt>Interested Categories</dt>
          <dd>
            @foreach( $user->categories as $category )
              {{ $category->name }}
            @endforeach
          </dd>
        </dl> 
      </li>
    </ul>
  </div>
  <div class="post-textbooks-wrapper">
    <h3 class="post-textbooks-title">出品中・出品済みの教科書</h3>
    <div class="flex">
      @foreach( $user->sellBooks as $sellbook )
        <a href="/profile/{{ $sellbook->id }}/detail"><img src="{{ $sellbook->image }}"></a>
      @endforeach
    </div>
  </div>
  <div class="btn-wrapper">
    <a href="/profile/{{ $user->id }}/edit" type="button" class="btn btn-success edit-btn">編集</a>
  </div>
</div>
@endsection 