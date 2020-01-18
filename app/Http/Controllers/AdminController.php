<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showMainPage() {
        return view('admin.mainPage');
    }

    public function showCommentsPage() {
        return view('admin.comments');
    }

    public function showAuthorInfoPage() {
        return view('admin.author');
    }
}


