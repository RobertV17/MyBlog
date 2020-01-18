<?php

Route::prefix('admin')->group(function() {
    Route::get('/',['as' => 'mainPage', 'uses' => 'AdminController@showMainPage']);

    // Articles
    Route::prefix('articles')->group(function() {
        Route::get('/',['as' => 'allArticles', 'uses' => 'ArticleController@showArticlesManager']);
        Route::get('/create',['as' => 'showCreateArticle', 'uses' => 'ArticleController@showCreateArticle']);
        Route::post('/create',['as' => 'createArticle', 'uses' => 'ArticleController@createArticle']);
    });

    // Categories
    Route::prefix('categories')->group(function() {
        Route::get('/', ['as' => 'allCategories', 'uses' => 'CategoryController@showCategoriesManager']);
        Route::get('/create', ['as' => 'showCreateCategory', 'uses' => 'CategoryController@showCreateCategory']);
        Route::post('/create', ['as' => 'createCategory', 'uses' => 'CategoryController@createCategory']);
    });

    Route::get('/comments',['as' => 'allComments', 'uses' => 'AdminController@showCommentsPage']);
    Route::get('/author',['as' => 'authorInfo', 'uses' => 'AdminController@showAuthorInfoPage']);
});
