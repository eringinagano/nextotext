@extends('layouts.profile_header')
@section('content')
<div class="container profile-container">
    <h2 class="profile-title">プロフィール編集画面</h2>
    <form action="/profile/edit" method="POST">
        @csrf
        <div class="profile-wrapper">
            <dl>
                <dt>ユーザーネーム</dt>
                <dd>
                    <input class="form-control" type="text" name="user[name]" placeholder="{{$user->name}}" value="{{ $user->name }}"/>
                    @error('user.name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dd>
            </dl>
            <dl>
                <dt>在籍している大学</dt>
                <dd>
                    <select name="user[university_id]" class="custom-select">
                        @foreach($universities as $university)
                          <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                    @error('user.university_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dd>
            </dl>
            <dl>
                <dt>興味のある学問分野</dt>
                <dd>
                    <select name="category_id[]" class="custom-select" size="3" multiple>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach  
                    </select>
                </dd>
            </dl> 
        </div>
        <input type="submit" class="btn btn-success edit-btn"></a>
    </form>    
</div>
@endsection