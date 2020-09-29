<?php
namespace App\Domain\Comment;

use App\Comment;

class CommentCreateService{

    public function execute(array $validatedRequest) {
        return Comment::create($validatedRequest);
    }
}