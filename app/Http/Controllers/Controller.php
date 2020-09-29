<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function paginatedResponse($paginatedData){
        // dd($paginatedData instanceof LengthAwarePaginator);
        $reponse = [
            'data'=> $paginatedData->items(),
            'meta'=> [
                'current_page'=> $paginatedData->currentPage(),
                'path'=> url()->current(),
                'from'=> $paginatedData->firstItem(),
                'per_page'=> $paginatedData->perPage(),
                'to'=> $paginatedData->lastItem(),
                'has_more_pages'=> $paginatedData->hasMorePages()
            ],
            '_links' => [
                'next' => $paginatedData->nextPageUrl(),
                'prev' => $paginatedData->previousPageUrl()
            ]
        ];
        
        if(isset($this->allowedIncludes)){
            $reponse['meta'] = array_merge($reponse['meta'],['allowed_includes' => $this->allowedIncludes]);

        }

        if($paginatedData instanceof LengthAwarePaginator){
            $reponse['meta'] = array_merge($reponse['meta'], ['total' => $paginatedData->total()]);
        }
        return $reponse;
        
    }

    public function itemResponse($itemData){
        $reponse = [
            'data' => $itemData
        ];

        if(isset($this->allowedIncludes)){
            $response['meta'] = [
                'allowed_includes' => $this->allowedIncludes
            ];
        }
        return $reponse;
    }
}
