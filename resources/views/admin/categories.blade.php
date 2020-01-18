@extends('admin.layouts.admin')

@section('title','Categories')

@section('content')
<div class="col">
    <h1>Все категории</h1>
    <div class="tools">
        <a href="<?php echo route('showCreateCategory')?>" class="btn btn-success" role="button">Создать</a>
    </div>
</div>
@endsection