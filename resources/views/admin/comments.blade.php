@extends('admin.layouts.admin')

@section('title','Комментарии')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/comments/comments.css') }}">
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

        <table class="table table-bordered" id="commentsTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Автор</th>
                <th scope="col">Содержание</th>
                <th scope="col">Статья</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($comments as $c)
                    <tr>
                        <th scope="row">{{ $c['id'] }}</th>
                        <td>{{ $c['author'] }}</td>
                        <td>{{ $c['text'] }}</td>
                        <td><a href="{{ route('showArticle',['id'=>$c['art_id']]) }}" class="actionTools goToArticle" target="_blank"></a></td>
                        <td>
                            <a href="{{ route('approvalComment',['id' => $c['id']]) }}" class="actionTools success"></a>
                            <a href="{{ route('deleteComment',['id' => $c['id']]) }}" class="actionTools delete""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            <div class="mx-auto">
                {{ $comments->links()}}
            </div>
        </div>
@endsection
