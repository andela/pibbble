<?php

namespace Pibbble\Helpers;

use Pibbble\User;
use Pibbble\Comment;
use Pibbble\Http\Requests\CommentRequest;
use Pibbble\Pibbble\Repository\CommentRepository;

class PostComment
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     *
     */
    public function saveProjectComment($id, User $user, CommentRequest $request)
    {
        $this->comment->comment = $request->comment;
        $this->comment->user_id = $user->id;
        $this->comment->project_id = $id;

        $this->comment->save();

        $commentId = Comment::where('comment', $request->comment)->first()->id;
        $commentRepo = new CommentRepository;

        return ['avatar'    => $user->avatar,
                'username'  => $user->username,
                'user_id'   => $user->id,
                'project_id' => $id,
                'comment'   => $request->comment,
                'comment_id' => $commentId,
                'comment_time' => $commentRepo->getCommentTime($commentId),
        ];
    }
}
