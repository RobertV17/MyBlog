<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showMainPage() {
        return view('admin.mainPage');
    }

    public function showArticlesPage() {
        return view('admin.articles');
    }

    public function showCategoriesPage() {
        return view('admin.categories');
    }

    public function showCommentsPage() {
        return view('admin.comments');
    }

    public function showAuthorInfoPage() {
        return view('admin.author');
    }
}


