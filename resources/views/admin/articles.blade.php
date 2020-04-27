@extends('admin.layouts.admin')

@section('title','Менеджер Статей')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/articles/allArticles.css') }}">
@endpush

@section('content')
    {{-- Вывод статусов --}}
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
                <th scope="col" class="col-1">ID</th>
                <th scope="col" class="col-5">Заголовок</th>
                <th scope="col" class="col-5">Категория</th>
                <th scope="col" class="col-1">Действие</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $a)
                <tr>
                    <th scope="row">{{ $a['id']}}</th>
                    <td>{{ $a['title']}}</td>
                    <td>{{ $a['category']}}</td>
                    <td>
                        <a href="{{ route('showUpdateArticle', ['id'=>$a['id']])}}" class="actionTools update"></a>
                        <a href="{{ route('deleteArticle', ['id'=>$a['id']])}}" class="actionTools delete"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links() }}

    <div class="tools">
        <a href="{{ route('showCreateArticle') }}" class="create"></a>
    </div>
@endsection
