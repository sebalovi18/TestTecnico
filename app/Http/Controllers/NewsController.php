<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteUserNewsRequest;
use App\Services\News\ServiceNews;

class NewsController extends Controller
{
    public function __construct(ServiceNews $service)
    {
        $this->service = $service;
    }

    public function getLastTenNews()
    {
        return $this->service->getLastTenNews();
    }

    public function storeUserNews(FavoriteUserNewsRequest $request)
    {
        return $this->service->storeUserNews($request->validated());
    }

    public function deleteUserNews(FavoriteUserNewsRequest $request)
    {
        return $this->service->deleteUserNews($request->validated());
    }
}
