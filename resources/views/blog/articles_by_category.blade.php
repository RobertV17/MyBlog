@extends('blog.layouts.blog')

@section('content')
    @foreach ($arts as $a)
        <div class="article">
            <div class="titleImage">
                <img src="{{ asset('storage/'.$a->preview_img) }}" alt="">
            </div>

            <div class="contentt">
                <div class="title">{{ $a->title }}</div>
                <div class="catigory">{{ $category }}</div>
                <div class="description">{{ $a->description }}</div>
                <a href="{{ route('showArticle', ['id' => $a->id]) }}">Читать полностью</a>
            </div>
        </div>
    @endforeach

{{ $arts->links() }}
@endsection
