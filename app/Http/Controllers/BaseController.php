<?php

namespace App\Http\Controllers;

use App\Service\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    
    public function __construct(protected Service $service) 
    {
    }
}
