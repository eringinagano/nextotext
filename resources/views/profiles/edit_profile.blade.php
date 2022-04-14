@extends('layouts.edit_profile_header')
@section('content')
<div class="container profile-container">
  <h2 class="profile-title">Profile</h2>
  <form action="/profile/{{ $user->id }}/update" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="profile-wrapper">
        <dl>
          <dt>大学名　※フルネームで入力してください　例：山田大学</dt>
          <dd>
            <input class="form-control" type="text" name="university_name" placeholder="{{$user->university_name}}" value="{{ $user->university_name }}"/>
              @error('user.university_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </dd>
        </dl>
        <dl>
          <dt>興味のあるカテゴリー</dt>
          <dd>
            <select name="category_id[]" class="custom-select" size="3" multiple>
              @foreach( $categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach  
            </select>
          </dd>
        </dl>
      </div>
      <div class="btn-wrapper">
        <input type="submit" class="btn btn-outline-success edit-btn" value="更新">
      </div>
  </form>    
</div>
@endsection