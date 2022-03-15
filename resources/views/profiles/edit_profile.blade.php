@extends('layouts.profile_header')
@section('content')
<div class="container profile-container">
    <h2 class="profile-title">Profile</h2>
    <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="profile-wrapper">
            <dl>
                <dt>ユーザーネーム</dt>
                <dd>
                    <input class="form-control" type="text" name="name" placeholder="{{$user->name}}" value="{{ $user->name }}"/>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dd>
            </dl>
            <dl>
                <dt>大学名</dt>
                <dd>
                    <select name="university_id" class="custom-select">
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
                <dt>興味のあるカテゴリー</dt>
                <dd>
                    <select name="category_id[]" class="custom-select" size="3" multiple>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach  
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>プロフィール画像</dt>
                <dd>
                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputFile" name="image">
                          <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択</label>
                        </div>
                     </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </dd>
            </dl>
        </div>
        <div class="btn-wrapper">
            <input type="submit" class="btn btn-success edit-btn" value="更新"></a>
        </div>
    </form>    
</div>
@endsection