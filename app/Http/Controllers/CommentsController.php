<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        $comment = new Comment();
        $comment->text = $request->get('message');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Ваш комментарий скоро будет добавлен.');
    }
}
