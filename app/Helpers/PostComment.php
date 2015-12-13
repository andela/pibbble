<?php

namespace Pibbble\Helpers;

use Pibbble\User;
use Pibbble\Comment;
use Pibbble\Http\Request\CommentRequest;
use Pibbble\Pibbble\Repository\CommentRepository;

class PostComment
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function saveProjectComment(User $user, CommentRequest $request)
    {
        $this->comment->comment    = $request->comment;
        $this->comment->user_id    = $user->id;
        $this->comment->project_id = $request->project_id;

        $this->comment->save();

        $commentId   = Comment::where('comment', $request->comment)->first()->id;
        $commentRepo = new CommentsRepository;

        return ['avatar'    => $user->avatar,
                'username'  => $user->username,
                'user_id'   => $user->id,
                'chop_id'   => $request->chop_id,
                'comment'   => $request->comment,
                'comment_id'=> $commentId,
                'comment_time' => $commentRepo->getCommentTime($commentId)
        ];
    }
}
