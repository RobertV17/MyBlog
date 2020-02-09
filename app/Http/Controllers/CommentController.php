<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function showCommentManager() {
        $noModerComments = Comment::where('moderated', 0)->get();
        return view('admin.comments', ['comments' => $noModerComments]);
    }

    public function deleteComment(Request $request, $id) {
        $comment = Comment::find($id);
        
        $status = ($comment->delete()) ? 'Комментарий удален.' : 'Возникла ошибка.';

        $request->session()->flash('status', $status);
        
        return redirect()->route('commentManager');

    }

    public function approvalComment(Request $request, $id) {
        $comment = Comment::find($id);
        $comment->moderated = 1;
        
        $status = ($comment->save()) ? 'Комментарий одобрен.' : 'Возникла ошибка.';

        $request->session()->flash('status', $status);
        
        return redirect()->route('commentManager');
        
    }
}
