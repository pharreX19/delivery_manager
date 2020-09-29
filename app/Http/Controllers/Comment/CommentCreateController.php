<?php
namespace App\Http\Controllers\Comment;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateRequest;
use App\Domain\Comment\CommentCreateService;


class CommentCreateController extends Controller{
    
    public function __invoke(CommentCreateRequest $request, CommentCreateService $commentCreateService)
    {
        try{
            $comment = $commentCreateService->execute($request->validated());
            return response()->json([
                'object' => 'Comment',
                'success_code' => 200,
                'success_message' => 'Comment Created Sucess',
                'data' => $comment
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'object' => 'Comment',
                'failure_code' => 500,
                'failure_message' => 'Unexpected Error'
            ], 500);
        }
    }
}