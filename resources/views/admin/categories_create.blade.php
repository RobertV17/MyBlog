@extends('admin.layouts.admin')

@section('title','Создать категорию')

@section('content')
    {{-- Вывод ошибок валидации --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('createCategory') }}">
        @csrf
        <div class="form-group">
            <label for="catTitle">Нименование</label>
            <input type="text" class="form-control" id="catTitle" name="title">
            <small id="emailHelp" class="form-text text-muted">Ограничение 100 символов</small>
        </div>

        <button type="submit" class="btn btn-outline-primary">Создать</button>
    </form>
@endsection
