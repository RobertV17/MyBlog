<?php

// Открытые маршруты
Route::get('/', ['as' => 'blogMainPage', 'uses' => 'ArticleController@showAllArticles']);
Route::get('/article/{id}', ['as' => 'showArticle', 'uses' => 'ArticleController@showArticle']);
Route::get('/author', ['as'=>'authorPage', 'uses' => 'AuthorController@showAuthorPage']);
Route::get('/category/{id}', ['as' => 'showArticleByCategory', 'uses' => 'ArticleController@showArticleByCategory']);
Route::post('/comment/send', ['as' => 'sendComment', 'uses' => 'CommentController@sendComment']);

// Маршруты доступные только админу
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/',['as' => 'adminDashboard', 'uses' => 'AdminController@showDashboard']);
    Route::get('/logout', ['as' => 'logoutFromAdmin', 'uses' => 'AdminController@logout']);

    // Статьи
    Route::prefix('articles')->group(function() {
        Route::get('/',['as' => 'articleManager', 'uses' => 'ArticleController@showArticlesManager']);
        Route::get('/create',['as' => 'showCreateArticle', 'uses' => 'ArticleController@showCreateArticle']);
        Route::post('/create',['as' => 'createArticle', 'uses' => 'ArticleController@createArticle']);
        Route::get('/delete/{id}', ['as' => 'deleteArticle', 'uses' => 'ArticleController@deleteArticle']);
        Route::get('/update/{id}', ['as' => 'showUpdateArticle', 'uses' => 'ArticleController@showUpdateArticle']);
        Route::post('/update', ['as' => 'updateArticle', 'uses' => 'ArticleController@updateArticle']);
        Route::post('/upload/image', ['as' => 'uploadImage', 'uses' => 'ArticleController@uploadImage']);
    });

    // Категории
    Route::prefix('categories')->group(function() {
        Route::get('/', ['as' => 'categoriesManager', 'uses' => 'CategoryController@showCategoriesManager']);
        Route::get('/create', ['as' => 'showCreateCategory', 'uses' => 'CategoryController@showCreateCategory']);
        Route::post('/create', ['as' => 'createCategory', 'uses' => 'CategoryController@createCategory']);
        Route::get('/delete/{id}', ['as' => 'deleteCategory', 'uses' => 'CategoryController@deleteCategory']);
        Route::get('/update/{id}', ['as' => 'showUpdateCategory', 'uses' => 'CategoryController@showUpdateCategory']);
        Route::post('/update', ['as' => 'updateCategory', 'uses' => 'CategoryController@updateCategory']);
    });

    // Автор
    Route::prefix('author')->group(function() {
    Route::get('/',['as' => 'authorInfo', 'uses' => 'AuthorController@showAuthorInfoManager']);
    Route::get('/update', ['as' => 'showUpdateAuthorInfo', 'uses' => 'AuthorController@showUpdateAuthorInfo']);
    Route::post('/update', ['as' => 'updateAuthorInfo', 'uses' => 'AuthorController@updateAuthorInfo']);
    });

    // Комменты
    Route::prefix('comments')->group(function() {
        Route::get('/', ['as' => 'commentManager', 'uses' => 'CommentController@showCommentManager']);
        Route::get('/delete/{id}', ['as' => 'deleteComment', 'uses' => 'CommentController@deleteComment']);
        Route::get('/approval/{id}', ['as' => 'approvalComment', 'uses' => 'CommentController@approvalComment']);
    });
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
