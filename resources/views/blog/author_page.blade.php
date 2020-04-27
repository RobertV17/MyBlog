@extends('blog.layouts.blog')

@section('content')
<div id="authorInfo">
    <div id="avatarArea">
        <img id="authorAva" src="{{ $avatar }}" alt="#">
    </div>
    <h2>{{ $author->name }}</h2>
    {{ $author->info }}
</div>
@endsection
