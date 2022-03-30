@extends('layouts.profile_header')
@section('content')
<div class="container profile-container">
    <h2 class="profile-title">Profile</h2>
    <div class="profile-wrapper">
        <ul>
            <li>
                <img src="{{ asset('storage/'.$user->image) }}" class="profile-img">
            </li>
            <li class="text-wrapper">
                <dl>
                    <dt>Name</dt>
                    <dd>{{$user->name}}</dd>
                </dl>
                <dl>
                    <dt>University</dt>
                    @if($university)
                      <dd>{{$user->university_name}}</dd>
                    @else
                      <dd class="university_null"></dd>
                    @endif
                </dl>
                <dl>
                    <dt>Interested Categories</dt>
                    <dd>
                        @foreach($user->categories as $category)
                        {{$category->name}}
                        @endforeach
                    </dd>
                </dl> 
            </li>
        </ul>
    </div>
    <div class="post-textbooks-wrapper">
        <h3 class="post-textbooks-title">出品した教科書</h3>
        <ul>
            @foreach($user->sellBooks as $sellbook)
            <li>
              <a href="/">
                <img src="{{ asset('storage/'.$sellbook->image) }}">
              </a>
            </li>  
            @endforeach
        </ul>
    </div>
    <div class="btn-wrapper">
        <a href="{{ route('profile.edit') }}" type="button" class="btn btn-success edit-btn">編集</a>
    </div>
</div>
<div class="show-textbooks">
    <a>購入した教科書</a
</div>
@endsection 