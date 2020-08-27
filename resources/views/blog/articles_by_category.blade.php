@extends('blog.layouts.blog')

@section('content')
    @foreach ($arts as $a)
        <div class="article">
            <div class="titleImage">
                <img src="{{ asset('storage/'.$a->preview_img) }}" alt="">
            </div>

            <div class="contentt">
                <div class="title"><a href="{{ route('showArticle', ['id' => $a->id]) }}">{{ $a->title }}</a></div>
                <div class="catigory">{{ $a->category }}</div>
                <div class="description">{{ $a->description }}</div>
            </div>
        </div>
    @endforeach

{{ $arts->links() }}
@endsection
