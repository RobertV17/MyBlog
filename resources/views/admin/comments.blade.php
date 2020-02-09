@extends('admin.layouts.admin')

@section('title','Коментарии')

@push('css')
    <link rel="stylesheet" href="<?php echo asset('css/admin/comments/commentManager.css')?>">
@endpush

@section('content')
    <div class="col" id="commentManagerContent">
        <h1>Модерация комментариев</h1>
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
                <th scope="col">Автор</th>
                <th scope="col">Содержание</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($comments as $c)
                <tr>
                    <th scope="row">{{ $c['id'] }}</th>
                    <td>{{ $c['author'] }}</td>
                    <td>{{ $c['text'] }}</td>
                    <td>
                        <a href="{{ route('approvalComment',['id' => $c['id']]) }}" class="btn btn-outline-primary" role="button">Одобрить</a>
                        <a href="{{ route('deleteComment',['id' => $c['id']]) }}" class="btn btn-outline-danger" role="button">Удалить</a>
                    </td>
                </tr>
            @endforeach
              
            </tbody>
        </table>
    </div>     
@endsection