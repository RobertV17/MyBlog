<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // Вывод страницы автора
    public function showAuthorPage() {
        $author = Author::find(1);

        if ($author->avatar_path == null) {
            $avatarUrl = asset('img/admin.jpeg');
        } else {
            $avatarUrl = asset('storage/'.$author->avatar_path);
        }

        return view('blog.author_page', ['author' => $author, 'avatar' => $avatarUrl]);
    }

    // Инфо об авторе в админке
    public function showAuthorInfoManager() {
        $author = Author::find(1);

        if ($author->avatar_path == null) {
            $avatarUrl = asset('img/admin.jpeg');
        } else {
            $avatarUrl = asset('storage/'.$author->avatar_path);
        }

        return view('admin.author', ['name' => $author['name'], 'info' => $author['info'], 'avatar' => $avatarUrl]);
    }

    // Выведет форму обновления инфы об авторе
    public function showUpdateAuthorInfo() {
        $author = Author::find(1);
        return view('admin.author_update', ['name' => $author['name'], 'info' => $author['info']]);
    }

    // Обновление инфы об авторе
    public function updateAuthorInfo(AuthorRequest $request) {
        $author = Author::find(1);

        $oldAvatarPath = 'public/'.$author->avatar_path;
        Storage::delete($oldAvatarPath);

        $author->name = $request['name'];
        $author->info = $request['info'];
        $avatarPath = explode('/', $request->file('avatar')->store('public'));
        $author->avatar_path = $avatarPath[1];

        $status = ($author->save()) ? 'Информация обновлена.' : 'Возникла ошибка.';

        $request->session()->flash('status', $status);
        
        return redirect()->route('authorInfo');
    }
}
