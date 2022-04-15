@extends('layouts.textbook_post_header')
@section('content')
<div class="container post-container">
    <h2 class="post-title">Post</h2>
    <div class="error-wrapper">
    @error('image')
　　  <li>{{$message}}</li>
    @enderror  
    @error('name')
　　  <li>{{$message}}</li>
    @enderror
    @error('author_name')
　　  <li>{{$message}}</li>
    @enderror
    </div>
    <form action="{{ route('textbook.post') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="post-wrapper">
          <dl>
            <dt>画像</dt>
            <dd>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" oninput="inputChange()" class="custom-file-input" id="inputFile" name="image" accept="image/*">
                  <label class="custom-file-label" for="inputFile" data-browse="参照" id="fileName"></label>
                </div>
              </div>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </dd>
          </dl>
          <dl>
            <dt>タイトル</dt>
            <dd>
              <input class="form-control" type="text" name="name"/>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </dd>
          </dl>
          <dl>
            <dt>著者　例：山田太郎</dt>
            <dd>
              <input class="form-control" type="text" name="author_name"/>
              @error('author_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </dd>
          </dl>
          <dl>
            <dt>学問分野</dt>
            <dd>
              <select name="category_id" class="custom-select">
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach  
              </select>
              @error('category_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </dd>
          </dl> 
          <dl>
            <dt>教科書の状態</dt>
            <dd>
              <select name="textbook_state_id" class="custom-select">
                @foreach($textbookstates as $textbookstate)
                  <option value="{{$textbookstate->id}}">{{$textbookstate->name}}</option>
                @endforeach  
              </select>
              @error('textbook_state_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </dd>
          </dl>
          <dl class="date-time">
            <dt>教科書出品日時</dt>
            <dd>
              <input type="date" class="form-control" name="date" id="today">
            </dd>
          </dl>
        </div>
        <div class="btn-wrapper">
          <input type="submit" class="btn btn-outline-success post-btn" value="出品">
        </div>
    </form>    
</div>
@endsection