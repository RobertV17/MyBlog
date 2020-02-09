@extends('admin.layouts.admin')

@section('title','Автор блога')

@push('css')
    <link rel="stylesheet" href="<?php echo asset('css/admin/author/author.css')?>">
@endpush

@section('content')
    <div class="col" id="AuthorContent">
       <h1>Информация об авторе</h1>
       @if(session('status'))
            <p><div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div></p>
        @endif
        

        <div id="avatar"><img src="{{ asset("$avatar") }}" alt="avatar" width="300" height="300"></div>
        <h3>{{ $name }}</h3>
        <div id="info">
            {!! $info !!}
        </div>
        
        <div class="tools">
            <a href="{{ route('showUpdateAuthorInfo')}}" class="btn btn-success" role="button">Обновить</a>
        </div><br> 
    </div>    
    


@endsection