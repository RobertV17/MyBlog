@extends('admin.layouts.admin')

@section('title','Admin Panel')

@section('content')
<div class="col">
    <h1>Все статьи</h1>
    <div class="tools">
        <a href="<?php echo route('showCreateArticle')?>" class="btn btn-success" role="button">Создать</a>
    </div>
</div>

@endsection