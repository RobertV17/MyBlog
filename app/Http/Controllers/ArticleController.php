<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function showArticleByCategory($id) {
        $articles = Article::where('cat_id', $id)->paginate(8);
        
        $categoryTitle = Category::find($id)->title; 

        return view('blog.articles_by_category', ['arts' => $articles, 'category' => $categoryTitle]);
    }

    public function showArticle($id) {
        $article = Article::find($id);

        return view('blog.article_page', ['article' => $article]);
    }

    public function showAllArticles()
    {
        $allArticles = Article::paginate(8);

        foreach($allArticles as $a) {
            $category = Category::find($a['cat_id']);
            $a['category'] = $category['title'];
        }

        return view('blog.main_page', ['arts' => $allArticles]);
    }

    public function showArticlesManager() {
        $allArticles = Article::paginate(8);

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
        $newArticle->cat_id = $request['catId'];
        $newArticle->description = $request['desc'];
        $newArticle->text = $request['content'];
        $newArticle->preview_img = explode('/', $request->file('previewImg')->store('public'))[1];
        
        $status = ($newArticle->save()) ? 'Cтатья успешно создана.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        
        return redirect()->route('allArticles');
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
        
        if($request->file('previewImg') != null) $article->preview_img = explode('/', $request->file('previewImg')->store('public'))[1];

        $status = ($article->save()) ? 'Cтатья успешно изменена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);
        
        return redirect()->route('allArticles');
    }

    public function uploadImage(Request $request) {
        $url = explode('/', $request->file('img')->store('public'))[1];
        $url = asset('/storage/'.$url);
        
        return response()->json(["url" => $url]);
    }
}
