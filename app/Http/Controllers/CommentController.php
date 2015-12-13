<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Pibbble\Comment;
use Pibbble\Helpers\PostComment;
use Pibbble\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function makeComment(CommentRequest $request, PostComment $comment)
    {
        $user = Auth::user();

        return $comment->saveProjectComment($user, $request);
    }

    public function find($id)
    {
        $comment = Comment::find($id);

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        
        return response()->json(['message' => 'Comment removed']);
    }
}
