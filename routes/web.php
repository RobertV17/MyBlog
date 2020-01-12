<?php

Route::prefix('admin')->group(function() {
    Route::get('/',['as' => 'mainPage', 'uses' => 'AdminController@showMainPage']);
    Route::get('/articles',['as' => 'allArticles', 'uses' => 'AdminController@showArticlesPage']);
    Route::get('/categories',['as' => 'allCategories', 'uses' => 'AdminController@showCategoriesPage']);
    Route::get('/comments',['as' => 'allComments', 'uses' => 'AdminController@showCommentsPage']);
    Route::get('/author',['as' => 'authorInfo', 'uses' => 'AdminController@showAuthorInfoPage']);
});
