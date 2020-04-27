@extends('admin.layouts.admin')

@section('title','Автор блога')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/author/author.css') }}">
@endpush

@section('content')
    {{-- Вывод статусов --}}
    @if(session('status'))
        <p>
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </p>
    @endif


    <div id="avatar"><img src="{{ $avatar }}" alt="avatar" width="250" height="250"></div>
    <h3>{{ $name }}</h3>
    <div id="info">
        {!! $info !!}
    </div>

    <div class="tools">
        <a href="{{ route('showUpdateAuthorInfo')}}" class="btn btn-outline-secondary" role="button">Обновить</a>
    </div><br>
@endsection
