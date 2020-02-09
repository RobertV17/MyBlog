@extends('admin.layouts.admin')

@section('title','Создание статьи')

@push('css')
    <link rel="stylesheet" href="<?php echo asset('css/admin/articles/createArticle.css')?>">
@endpush

@section('content')
<div class="col" id="createArticleContent">
    <h1>Создание статьи</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('createArticle') }}">
        @csrf
        <div class="form-group">
          <label for="titleArt">Заголовок</label>
          <input type="text" class="form-control" id="titleArt" name="title">
        </div>

        <div class="form-group">
            <label for="desc">Краткое описание</label>
            <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
        </div>

        <div class="form-group">
            <label for="cats">Категория</label>
            <select class="form-control" id="cats" name="cat_id">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->title }}</option>      
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">Творите</label>
            <textarea class="form-control" id="contentArea" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">Создать</button>
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