<?php

Route::prefix('admin')->group(function() {
    Route::get('/',['as' => 'mainPage', 'uses' => 'AdminController@showMainPage']);

    // Articles
    Route::prefix('articles')->group(function() {
        Route::get('/',['as' => 'allArticles', 'uses' => 'ArticleController@showArticlesManager']);
        Route::get('/create',['as' => 'showCreateArticle', 'uses' => 'ArticleController@showCreateArticle']);
        Route::post('/create',['as' => 'createArticle', 'uses' => 'ArticleController@createArticle']);
        Route::get('/delete/{id}', ['as' => 'deleteArticle', 'uses' => 'ArticleController@deleteArticle']);
        Route::get('/update/{id}', ['as' => 'showUpdateArticle', 'uses' => 'ArticleController@showUpdateArticle']);
        Route::post('/update', ['as' => 'updateArticle', 'uses' => 'ArticleController@updateArticle']);
    });

    // Categories
    Route::prefix('categories')->group(function() {
        Route::get('/', ['as' => 'allCategories', 'uses' => 'CategoryController@showCategoriesManager']);
        Route::get('/create', ['as' => 'showCreateCategory', 'uses' => 'CategoryController@showCreateCategory']);
        Route::post('/create', ['as' => 'createCategory', 'uses' => 'CategoryController@createCategory']);
        Route::get('/delete/{id}', ['as' => 'deleteCategory', 'uses' => 'CategoryController@deleteCategory']);
        Route::get('/update/{id}', ['as' => 'showUpdateCategory', 'uses' => 'CategoryController@showUpdateCategory']);
        Route::post('/update', ['as' => 'updateCategory', 'uses' => 'CategoryController@updateCategory']);
    });

    // Author
    Route::prefix('author')->group(function() {
    Route::get('/',['as' => 'authorInfo', 'uses' => 'AuthorController@showAuthorInfoManager']);
    Route::get('/update', ['as' => 'showUpdateAuthorInfo', 'uses' => 'AuthorController@showUpdateAuthorInfo']);
    Route::post('/update', ['as' => 'updateAuthorInfo', 'uses' => 'AuthorController@updateAuthorInfo']);
    });

    // Comments
    Route::prefix('comments')->group(function() {
        Route::get('/', ['as' => 'commentManager', 'uses' => 'CommentController@showCommentManager']);
        Route::get('/delete/{id}', ['as' => 'deleteComment', 'uses' => 'CommentController@deleteComment']);
        Route::get('/approval/{id}', ['as' => 'approvalComment', 'uses' => 'CommentController@approvalComment']);
    });
});
