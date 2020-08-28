<?php
use App\Models\Author;

$author = Author::find(1);

if ($author->avatar_path == null) {
    $avatar = asset('img/author.jpg');
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
    <link rel="stylesheet" href="{{ asset('css/confirmJq/jquery-confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    @stack('css')
    <title>@yield('title')</title>
</head>
<body>
    <div id="menu">
        <div id="smartphoneMenu" data-stage="closed"></div>

        <div id="menuHeader">
            <img src="{{ $avatar }}" alt="avatar">
            <h4>{{ explode(' ',$author->name )[0]}}</h4>
        </div>

        <div id="menuContent">
            <a href="{{ route('articleManager') }}">Статьи</a>
            <a href="{{ route('categoriesManager') }}">Категории</a>
            <a href="{{ route('commentManager') }}">Комментарии</a>
            <a href="{{ route('authorInfo') }}">Автор</a>
            <a id="exitBtn" href="{{ route('logoutFromAdmin') }}">Выход</a>
        </div>
    </div>

    <div class="container" id="mainContent">
        <div class="row">
            <div class="col content">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/confirmJq/jquery-confirm.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>
    @stack('js')
    <script>
        $(window).resize(function(){
            if ($(window).width() > 900 ) {
                $('#menu').css('left','0px');
            }
        });

        $('#smartphoneMenu').on('click', function() {
            if($(this).attr('data-stage') === 'closed') {
                $('#menu').animate({'left':'240px'}, 200);

                $(this).attr('data-stage', 'opened');
            } else {
                $('#menu').animate({'left':'0'}, 200);

                $(this).attr('data-stage', 'closed');
            }
        });
    </script>
</body>
</html>
