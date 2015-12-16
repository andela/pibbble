<?php

namespace Pibbble\Http\Controllers;

use Auth;
use Response;
use Pibbble\Comment;
use Pibbble\Project;
use Pibbble\Helpers\PostComment;
use Pibbble\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     *
     */
    public function makeComment($id, CommentRequest $request, PostComment $comment)
    {
        $user = Auth::user();

        return Response::json($comment->saveProjectComment($id, $user, $request));
    }

    /**
     *
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json(['message' => 'Comment removed.']);
    }
}
