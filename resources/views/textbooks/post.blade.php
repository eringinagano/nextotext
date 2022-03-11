@extends('layouts.textbook_post_header')
@section('content')
<div class="container post-container">
    <h2 class="post-title">Post</h2>
    <form action="{{ route('textbook.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="post-wrapper">
            <dl>
                <dt>Image</dt>
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
                <dt>著者</dt>
                <dd>
                    <select name="author_id" class="custom-select">
                        @foreach($authors as $author)
                          <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
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
            <input type="submit" class="btn btn-success post-btn" value="出品"></a>
        </div>
    </form>    
</div>
<script type="text/javascript">
  
  window.onload = function () {
      
    let today = new Date();  
    today.setDate(today.getDate());
    let yyyy = today.getFullYear();
    let mm = ("0" + (today.getMonth() + 1)).slice(-2);
    let dd = ("0" + today.getDate()).slice(-2);
    
    document.getElementById("today").value = yyyy + '-' + mm + '-' + dd;
    
  }
  
</script>
@endsection