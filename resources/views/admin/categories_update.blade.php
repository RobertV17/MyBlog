@extends('admin.layouts.admin')

@section('title','Обновить категорию')

@push('css')
    <link rel="stylesheet" href="<?php echo asset('css/admin/categories/updateCategory.css')?>">
@endpush

@section('content')
<div class="col" id="updateCategoryContent">
    <h1>Обновить категорию</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="<?php echo route('updateCategory')?>">
        @csrf
        <div class="form-group">
        <input type="hidden" name="catId" value="{{ $category['id'] }}">
            <label for="catTitle">Нименование</label>
            <input type="text" class="form-control" id="catTitle" name="title" value="{{ $category['title'] }}">
            <small id="emailHelp" class="form-text text-muted">Ограничение 100 символов</small>
        </div>
    
    <button type="submit" class="btn btn-outline-primary">Обновить</button>
  </form>
</div>
@endsection