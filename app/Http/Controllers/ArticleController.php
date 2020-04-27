<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $comments = Comment::where(['art_id' => $id], ['moderated' => 1])->get();

        if ($comments->isEmpty()) $comments = null;

        return view('blog.article_page', ['article' => $article, 'comments' => $comments]);
    }

    public function showAllArticles()
    {
        $allArticles = Article::paginate(8);

        foreach($allArticles as $a) {
            $category = Category::find($a['cat_id']);
            $a['category'] = $category['title'];
        }

        return view('blog.main_page', ['articles' => $allArticles]);
    }

    // Вывод мененджера статей в админке
    public function showArticlesManager() {
        $allArticles = Article::paginate(8);

        foreach($allArticles as $a) {
            $category = Category::find($a['cat_id']);
            $a['category'] = $category['title'];
        }

        return view('admin.articles', ['articles' => $allArticles]);
    }

    public function showCreateArticle() {
        $categories = Category::all();

        return view('admin.articles_create', ['categories' => $categories]);
    }

    public function createArticle(ArticleRequest $request) {
        $newArticle = Article::create([
            'title' =>$request['title'],
            'cat_id' =>$request['catId'],
            'description' =>$request['desc'],
            'text' =>$request['content'],
            'preview_img' =>explode('/', $request->file('previewImg')->store('public'))[1]
        ]);

        $status = ($newArticle) ? 'Cтатья успешно создана.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);

        return redirect()->route('articleManager');
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

        $article->update([
            'title' => $request['title'],
            'cat_id' => $request['cat_id'],
            'description' => $request['desc'],
            'text' => $request['content'],
        ]);

        if($request->previewImg != null) $article->preview_img = explode('/', $request->file('previewImg')->store('public'))[1];

        $status = ($article->save()) ? 'Cтатья успешно изменена.' : 'Возникла ошибка.';
        $request->session()->flash('status', $status);

        return redirect()->route('articleManager');
    }

    public function uploadImage(Request $request) {
        $url = explode('/', $request->file('img')->store('public'))[1];
        $url = asset('/storage/'.$url);

        return response()->json(["url" => $url]);
    }
}
