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
        <h5>Комментарии:</h5>
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
        <div class="form-group">
            <label for="author">Имя:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Имя">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email">
        </div>

        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" rows="5" name="comment"></textarea>
        </div>

        <div id="sendCommentBlock">
            <button id="sendComment" data-article="{{ $article->id }}" data-url="{{ route('sendComment') }}" type="button" class="btn btn-outline-primary">Отправить комментарий</button>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/sendComment.js') }}"></script>
@endpush
