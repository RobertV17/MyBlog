@extends('admin.layouts.admin')

@section('title','Редактирование статьи')

@section('content')
<div class="col">
    <h1>Редактирование статьи</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="<?php echo route('updateArticle');?>">
        @csrf
        <input type="hidden" name="articleId" value="{{ $article['id'] }}">
        <div class="form-group">
          <label for="titleArt">Заголовок</label>
        <input type="text" class="form-control" id="titleArt" name="title" value="{{ $article['title'] }}">
        </div>

        <div class="form-group">
            <label for="desc">Краткое описание</label>
        <textarea class="form-control" id="desc" rows="3" name="desc">{{ $article['description']}}</textarea>
        </div>

        <div class="form-group">
            <label for="cats">Категория</label>
            <select class="form-control" id="cats" name="cat_id">
                @foreach ($categories as $c)
                    <option @if ($c['id'] == $article['cat_id']) selected="selected" @endif
                     value="{{ $c->id }}">{{ $c->title }}</option>      
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">Творите</label>
        <textarea class="form-control" id="contentArea" name="content">{{$article['text']}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
        </div>
      </form>
</div>
@endsection

@push('js')
    <script src="<?php echo asset('js/CKEeditor/ckeditor.js')?>"></script>
    <script>
        CKEDITOR.replace( 'contentArea' );
    </script>
@endpush