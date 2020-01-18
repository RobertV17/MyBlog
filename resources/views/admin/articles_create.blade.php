@extends('admin.layouts.admin')

@section('title','Create Article')

@section('content')
<div class="col">
    <h1>Создание статьи</h1>

    <form method="POST" action="<?php echo route('createArticle');?>">
        @csrf
        <div class="form-group">
          <label for="titleArt">Заголовок</label>
          <input type="text" class="form-control" id="titleArt" name="title">
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
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
        </div>
      </form>
</div>

@endsection