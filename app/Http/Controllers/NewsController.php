<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteUserNewsRequest;
use App\Services\News\ServiceNews;
use Illuminate\Support\Facades\Auth;

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
        $response = $this->service->storeUserNews(
            $request->validated(), 
            Auth::user()
        );

        return response($response, 201);
    }
    public function deleteUserNews(FavoriteUserNewsRequest $request)
    {
        $response = $this->service->deleteUserNews(
            $request->validated(), 
            Auth::user()
        );

        return response($response, 204);
    }
    public function getUserNews()
    {
        return $this->service->getUserNews(Auth::user());
    }
}
