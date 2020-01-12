<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo asset('css/admin/main.css')?>">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="menu" tabindex="0">
        <div class="smartphone-menu-trigger"></div>
    <header class="avatar">
            <img src="<?php echo asset('img/admin.jpeg')?>" />
        <h2>John D.</h2>
    </header>
        <ul>
        <li tabindex="0" class="icon-dashboard"><a href='<?php echo route('allArticles')?>'><span>Статьи</span></a></li>
        <li tabindex="0" class="icon-customers"><a href='<?php echo route('allCategories')?>'><span>Категории</span></a></li>
        <li tabindex="0" class="icon-users"><a href='<?php echo route('allComments')?>'><span>Комментарии</span></a></li>
        <li tabindex="0" class="icon-settings"><a href='<?php echo route('authorInfo')?>'><span>Автор</span></a></li>
    </ul>
    </nav>

    <div class="container content">
        <div class="row">
        @yield('content')
        </div>
    </div>
</body>

<script src="<?php echo asset('js/jquery.js')?>"></script>
<script src="<?php echo asset('js/bootstrap.min.js')?>"></script>
</html>