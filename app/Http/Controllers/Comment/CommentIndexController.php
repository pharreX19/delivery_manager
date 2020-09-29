<?php

namespace App\Http\Controllers\Comment;

use App\Domain\Comment\CommentIndexService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new CommentIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
