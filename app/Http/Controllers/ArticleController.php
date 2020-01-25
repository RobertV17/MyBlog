<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function showArticlesManager() {
        $allArticles = Article::all();

        foreach($allArticles as $a) {
            $category = Category::find($a['cat_id']);
            $a['category'] = $category['title'];
        }

        return view('admin.articles', ['arts' => $allArticles]);
    }

    public function showCreateArticle() {
        $categories = Category::all();
        return view('admin.articles_create', ['categories' => $categories]);
    }

    public function createArticle(ArticleRequest $request) {
        $newArticle = new Article;
        $newArticle->title = $request['title'];
        $newArticle->cat_id = $request['cat_id'];
        $newArticle->description = $request['desc'];
        $newArticle->text = $request['content'];

        if($newArticle->save()) {
            echo 'All good';
        } else {
            echo 'We have big problems';
        }
    }

    public function deleteArticle(Request $request, $id) {
        $article = Article::find($id);

        $status = ($article->delete()) ? 'Cтатья успешно удалена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        return back();
    }

    public function showUpdateArticle($id) {
        $article = Article::find($id);
        $categories = Category::all();

        return view('admin.articles_update', ['article' => $article, 'categories' => $categories]);
    }

    public function updateArticle(ArticleRequest $request) {
        $article = Article::find($request['articleId']);

        $article->title = $request['title'];
        $article->cat_id = $request['cat_id'];
        $article->description = $request['desc'];
        $article->text = $request['content'];

        $status = ($article->save()) ? 'Cтатья успешно изменена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        
        return redirect()->route('allArticles');
    }
}
