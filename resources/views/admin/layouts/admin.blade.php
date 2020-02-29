<?php 
use App\Models\Author;

$author = Author::find(1);

if ($author->avatar_path == null) {
    $avatar = asset('img/admin.jpeg');
} else {
    $avatar = asset('storage/'.$author->avatar_path);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    @stack('css')
    <title>@yield('title')</title>
</head>
<body>
    <nav class="menu" tabindex="0">
        <div class="smartphone-menu-trigger"></div>

        <header class="avatar">
            <img src="{{ $avatar }}" width="100" height="100" />
            <h4>{{ $author->name }}</h4>
        </header>

        <ul>
            {{-- <li tabindex="0" class="icon-panel"><a href='{{ route('adminDashboard') }}'><span>Панель управления</span></a></li> --}}
            <li tabindex="0" class="icon-dashboard"><a href='{{ route('articleManager') }}'><span>Статьи</span></a></li>
            <li tabindex="0" class="icon-customers"><a href='{{ route('categoriesManager') }}'><span>Категории</span></a></li>
            <li tabindex="0" class="icon-users"><a href='{{ route('commentManager') }}'><span>Комментарии</span></a></li>
            <li tabindex="0" class="icon-settings"><a href='{{ route('authorInfo') }}'><span>Автор</span></a></li>
            <li tabindex="0" class="icon-settings"><a href='{{ route('logoutFromAdmin') }}'><span>Выход</span></a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col content">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@stack('js')
</html>