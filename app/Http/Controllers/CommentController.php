<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Вывод менеджера коментов админке
    public function showCommentManager() {
        $noModerComments = Comment::where('moderated', 0)->paginate(8);
        return view('admin.comments', ['comments' => $noModerComments]);
    }

    // Удаление комента
    public function deleteComment(Request $request, $id) {
        $comment = Comment::find($id);
        
        $status = ($comment->delete()) ? 'Комментарий удален.' : 'Возникла ошибка.';

        $request->session()->flash('status', $status);
        
        return redirect()->route('commentManager');

    }

    // Публикация комента
    public function approvalComment(Request $request, $id) {
        $comment = Comment::find($id);
        $comment->moderated = 1;
        
        $status = ($comment->save()) ? 'Комментарий одобрен.' : 'Возникла ошибка.';

        $request->session()->flash('status', $status);
        
        return redirect()->route('commentManager');
        
    }
}
