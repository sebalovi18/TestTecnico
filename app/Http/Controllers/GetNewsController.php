<?php

namespace App\Http\Controllers;

use App\Services\ServiceGetNews\ServiceGetNews;
use Illuminate\Http\Request;

class GetNewsController extends Controller
{
    public function __construct(ServiceGetNews $service)
    {
        $this->service = $service;
    }

    public function getLastTenNews()
    {
        return $this->service->getLastTenNews();
    }
}
