@extends('admin.layouts.admin')

@section('title','Категории')

@push('css')
    <link rel="stylesheet" href="<?php echo asset('css/admin/categories/allCategories.css')?>">
@endpush

@section('content')
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
                        <a href="{{ route('showUpdateCategory', ['id'=>$c['id']])}}" class="btn btn-outline-primary" role="button">Обновить</a>
                        <a href="{{ route('deleteCategory', ['id'=>$c['id']])}}" class="btn btn-outline-danger" role="button">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cats->links() }}

    <div class="tools">
        <a href="<?php echo route('showCreateCategory')?>" class="btn btn-outline-primary" role="button">Создать категорию</a>
    </div>
@endsection