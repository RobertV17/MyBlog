@extends('admin.layouts.admin')

@section('title','Обновление информации о авторе')

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

    <form method="POST" action="{{ route('updateAuthorInfo') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titleArt">Полное имя:</label>
            <input type="text" class="form-control" id="titleArt" name="name" value="{{ $name}}">
        </div>

        <div class="form-group">
            <label for="content">Расскажите о себе:</label>
            <textarea class="form-control" id="contentArea" name="info">{{ $info }}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Ваше фото:</label>
            <input type="file" class="form-control-file" id="avatar" name="avatar">
        </div>

        <button type="submit" class="btn btn-outline-primary">Обновить</button>
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/CKEeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'contentArea' );
    </script>
@endpush
