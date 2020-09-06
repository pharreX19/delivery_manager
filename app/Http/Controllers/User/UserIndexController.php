<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Domain\User\UserService;
use App\Http\Controllers\Controller;

class UserIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new UserService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
