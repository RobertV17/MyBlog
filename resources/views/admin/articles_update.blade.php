@extends('admin.layouts.admin')

@section('title','Редактирование статьи')

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

    <form method="POST" action="{{ route('updateArticle') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="articleId" value="{{ $article['id'] }}">
        <div class="form-group">
            <label for="titleArt">Заголовок</label>
            <input type="text" class="form-control" id="titleArt" name="title" value="{{ $article['title'] }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Изображение для превью</label>
            <input type="file" name="previewImg" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="desc">Краткое описание</label>
            <textarea class="form-control" id="desc" rows="3" name="desc">{{ $article['description']}}</textarea>
        </div>

        <div class="form-group">
            <label for="cats">Категория</label>
            <select class="form-control" id="cats" name="cat_id">
                @foreach ($categories as $c)
                    <option @if ($c['id'] == $article['cat_id']) selected="selected" @endif
                     value="{{ $c->id }}">{{ $c->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="alert alert-secondary" role="alert">
            При написании статьи вы можете использовать свои фотографии, для этого нужно загрузить их на сервер и использовать  полученную ссылку в редакторе
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Загрузить фото на сервер</label>
            <input type="file" name="img" class="form-control-file" id="uploadArea"><br>
            <button id="uploadImage" type="button" class="btn btn-outline-primary">Загрузить</button>
        </div>

        <div class="form-group">
            <label for="content">Творите</label>
            <textarea class="form-control" id="contentArea" name="content">{!!$article['text']!!}</textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">Обновить</button>
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'contentArea' );

        // при нажатии кнопки загрузки катинки на сервер
        $('#uploadImage').on('click', function() {
            var fd = new FormData();
            var files = $('#uploadArea')[0].files[0];
            fd.append('img',files);

        $.ajax({
            url: '{{ route('uploadImage') }}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
                alert('Сылка на изображение: '+ data.url);
            },
        });
            });
    </script>
@endpush
