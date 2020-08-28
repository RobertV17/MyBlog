@extends('blog.layouts.blog')

@section('content')
    {{--  Статья  --}}
    <div id="articleArea">
        <h2>{{ $article->title }}</h2>
        <div class="articleText">
            {!! $article->text !!}
        </div>
    </div>

    {{-- Комменты --}}
    <div id="allComments">
        <h5><b>Комментарии:</b></h5>
        @if($comments)
            @foreach($comments as $c)
                <div class="commentBlock">
                    <div class="author">{{ $c->author }}</div>
                    <div class="date">{{ $c->created_at }}</div>
                    <div class="commentBody">
                       {{ $c->text }}
                    </div>
                </div>
            @endforeach
        @else
            <div id="noCommentsAlert" class="alert alert-secondary" role="alert">
                На данный момент, комментарии отстсвуют.
            </div>
        @endif
    </div>

    {{-- Форма создания коммента --}}
    <div id="writeComment">

        <div class="form-row">
            <div class="col-sm">
                <label for="author"><b>Имя:</b></label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Имя">
            </div>
            <div class="col-sm">
                <label for="email"><b>E-mail:</b></label>
                <input type="text" class="form-control" id="email" name="mail" placeholder="email">
            </div>
        </div>

        <div class="form-group commentText">
            <label for="comment"><b>Комментарий:</b></label>
            <textarea class="form-control" id="comment" rows="5" name="comment"></textarea>
        </div>

        <div id="sendCommentBlock">
            <button id="sendComment" data-article="{{ $article->id }}" data-url="{{ route('sendComment') }}" type="button" class="btn btn-outline-primary">Отправить</button>
        </div>
    </div>
@endsection

{{--@push('js')--}}
{{--    <script src="{{ asset('js/sendComment.js') }}"></script>--}}
{{--@endpush--}}
