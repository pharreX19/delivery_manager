<?php

namespace App\Http\Controllers\Staff;

use App\Domain\Staff\StaffIndexService;
use App\Http\Controllers\Controller;

class StaffIndexController extends Controller
{
    protected $allowedIncludes = [''];
    protected $allowedFilters = [''];
    protected $allowedSorts = ['created_at', 'id'];


    public function __invoke(){
        return $this->paginatedResponse((new StaffIndexService($this->allowedIncludes, $this->allowedFilters, $this->allowedSorts))->execute());

    }
}
