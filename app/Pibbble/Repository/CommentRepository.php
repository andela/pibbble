<?php

namespace Pibbble\Pibbble\Repository;

use Pibbble\Comment;

class CommentRepository
{
    public function getTimeOfComment()
    {
        $comment = Comment::find($commentId);

        return $comment->created_at->diffForHumans();
    }
}
