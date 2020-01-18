<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function showArticlesManager() {
        return view('admin.articles');
    }

    public function showCreateArticle() {
        $categories = Category::all();
        return view('admin.articles_create', ['categories' => $categories]);
    }

    public function createArticle(Request $request) {
        $newArticle = new Article;
        $newArticle->title = $request['title'];
        $newArticle->cat_id = $request['cat_id'];
        $newArticle->text = $request['content'];

        if($newArticle->save()) {
            echo 'All good';
        } else {
            echo 'We have big problems';
        }
    }
}
