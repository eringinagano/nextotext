@extends('layouts.profile_header')
@section('content')
<div class="container profile-container">
    <h2 class="profile-title">プロフィール</h2>
    <div class="profile-wrapper">
        <dl>
            <dt>ユーザーネーム</dt>
            <dd>{{$user->name}}</dd>
        </dl>
        <dl>
            <dt>在籍している大学</dt>
            <dd>{{$user->university->name}}</dd>
        </dl>
        <dl>
            <dt>興味のある学問分野</dt>
            <dd>
                @foreach($user->categories as $category)
                {{$category->name}}
                @endforeach
            </dd>
        </dl> 
    </div>
    <a href="{{ route('profile.edit') }}" type="button" class="btn btn-success edit-btn">編集</a>
</div>
<div class="show-textbooks">
    <a>購入した教科書</a>
    <a>出品した教科書</a>
</div>
@endsection 