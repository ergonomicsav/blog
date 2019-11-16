<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CommentsController
 * @package App\Http\Controllers\Admin
 */
class CommentsController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
