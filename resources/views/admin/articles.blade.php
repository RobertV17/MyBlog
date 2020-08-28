@extends('admin.layouts.admin')

@section('title','Менеджер Статей')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/articles/allArticles.css') }}">
@endpush

@section('content')
    <div class="tools">
        <a href="{{ route('showCreateArticle') }}" class="create"></a>
    </div>

    {{-- Вывод статусов --}}
    @if(session('status'))
        <p><div class="alert alert-secondary alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div></p>
    @endif

    <table class="table table-bordered" id="artsTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Категория</th>
                <th scope="col">Действие</th>
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

    <div class="d-flex">
        <div class="mx-auto">
            {{ $articles->links() }}
        </div>
    </div>



@endsection
