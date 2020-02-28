@extends('blog.layouts.blog')

@section('content')
<div id="articleArea">
    <h2>{{ $article->title }}</h2>
    <div class="articleText">
        {!! $article->text !!}
    </div>
</div>
@endsection