<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use ApiResponse;
    
    public function index()
    {
        return $this->sendResponse('Welcome', 'Api Response');
    }
}
