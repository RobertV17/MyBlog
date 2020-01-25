@extends('admin.layouts.admin')

@section('title','Categories')

@section('content')
<div class="col">
    <h1>Все категории</h1>

    <div class="tools">
        <a href="<?php echo route('showCreateCategory')?>" class="btn btn-success" role="button">Создать</a>
    </div>

    @if(session('status'))
        <p><div class="alert alert-secondary alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div></p>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Наименование</th>
            <th scope="col">Действие</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($cats as $c)
            <tr>
                <th scope="row">{{ $c['id']}}</th>
                <td>{{ $c['title']}}</td>
                <td>
                    <a href="{{ route('showUpdateCategory', ['id'=>$c['id']])}}" class="btn btn-success" role="button">Обновить</a>
                    <a href="{{ route('deleteCategory', ['id'=>$c['id']])}}" class="btn btn-danger" role="button">Удалить</a>
                </td>
            </tr>
        @endforeach
          
        </tbody>
    </table>


</div>
@endsection